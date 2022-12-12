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
                                <div>
                                    <div class="mt-4">
                                    <VLabel value="Modelo: " />
                                    <VErInput :message="errors.modelo" />
                                    <VTInput 
                                        class="mt-1 block w-full"
                                        type="text"
                                        v-model="form.modelo" 
                                    />
                                </div>
                                <div class="mt-4">
                                    <VLabel value="Marca: " />
                                    <VErInput :message="errors.modelo" />
                                    <VTInput 
                                        class="mt-1 block w-full"
                                        type="text"
                                        v-model="form.modelo" 
                                    />
                                </div>
                                <div class="mt-4">
                                    <VLabel value="Placa: " />
                                    <VErInput :message="errors.modelo" />
                                    <VTInput 
                                        class="mt-1 block w-full"
                                        type="text"
                                        v-model="form.modelo" 
                                    />
                                </div>
                                <div class="mt-4">
                                    <VLabel value="Color: " />
                                    <VErInput :message="errors.modelo" />
                                    <VTInput 
                                        class="mt-1 block w-full"
                                        type="text"
                                        v-model="form.modelo" 
                                    />
                                </div>
                                <div class="mt-4">
                                    <VLabel value="Tipo: " />
                                    <VErInput :message="errors.modelo" />
                                    <VTInput 
                                        class="mt-1 block w-full"
                                        type="text"
                                        v-model="form.modelo" 
                                    />
                                </div>
                                <div class="mt-4">
                                    <VLabel value="Estado: " />
                                    <VErInput :message="errors.modelo" />
                                    <VTInput 
                                        class="mt-1 block w-full"
                                        type="text"
                                        v-model="form.modelo" 
                                    />
                                </div>
                                <div class="mt-4"></div>
                                </div>
                                <div>

                                </div>
                                <VButton type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    enviar
                                </VButton>
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
    props:["errors"],

    data() {
        return{
            form: {
                modelo: "asd",
                marca: "das",
                placa: "asd",
                color: "asd",
                tipo: 1,
                estado: 2,
                principal_photo_path: "asd",
                segundary_photo_path: "asd",
            }
        }
    },

    methods: {
        submit(){
            Inertia.post(route("vehiculo.store"),this.form);
        }
    }
}
</script>