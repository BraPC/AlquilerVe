<template>
    
    <SideBar>
        <template #tema>
            <AppLayout title="Dashboard">
                <template #header>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Administracion de usuarios
                    </h2>
                </template>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                              
                              <form @submit.prevent="submit">
                                <VButton type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" >
                                    <Link :href="route('admin.index')">REGRESAR</Link>
                                </VButton>
                                <div class="mt-4">
                                    <VLabel value="Nombre: " />
                                    <VErInput :message="errors.name" />
                                    <VLabel :value="form.name" />
                                </div>
                                <div class="mt-4">
                                    <VLabel value="Apellido: " />
                                    <VErInput :message="errors.Email" />
                                    <VLabel :value="form.last_name" />
                                </div>
                                <div class="mt-4">
                                    <VLabel value="Correo: " />
                                    <VErInput :message="errors.name" />
                                    <VLabel :value="form.email" />
                                </div>
                                <div class="mt-4"></div>
                                
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </AppLayout>
        </template>
    </SideBar>
    <Footer/>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'
    import SideBar from '@/Components/SideBar.vue'
    import Footer from '@/Components/Footer.vue';
    import VLabel from '@/Components/InputLabel.vue';
    import VErInput from '@/Components/InputError.vue';
    import VTInput from '@/Components/TextInput.vue';
    import VButton from '@/Components/PrimaryButton.vue';
    import { Inertia } from '@inertiajs/inertia';
</script>

<script>
export default {
    props:['us',"errors"],

    data() {
        return{
            form: {
                name: this.us.name,
                email: this.us.email,
                last_name: this.us.last_name,
                rol: this.rol,

            }
        }
    },

    methods: {
        submit(){
            Inertia.put(route("admin.update",{'custom':this.us}),this.form);
        }
    }
}
</script>