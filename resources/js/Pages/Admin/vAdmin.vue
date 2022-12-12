
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
                                
                                
                                <VButton type="button" class="ml-4" >
                                    <Link :href="route('admin.create')">Crear Usuario</Link>
                                </VButton>
                                
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr>
                                            <th class="p-3">#</th>
                                            <th class="p-3">Nombre</th>
                                            <th class="p-3">Apellido</th>
                                            <th class="p-3">Cedula</th>
                                            <th class="p-3">Rol</th>
                                            <th class="p-3">Email</th>
                                            <th class="p-3">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="user in users" :key="user.id">
                                            <td class="p-3 border">{{user.id}}</td>
                                            <td class="p-3 border">{{user.name}}</td>
                                            <td class="p-3 border">{{user.last_name}}</td>
                                            <td class="p-3 border">{{user.identif}}</td>
                                            <td v-if="user.roles == ''" class="p-3 border">sin rol</td>
                                            <td v-else class="p-3 border">{{user.roles[0].name}}</td>
                                            <td class="p-3 border">{{user.email}}</td>
                                            <td class="p-3 border">
                                                <VButton type="button" class="ml-4" >
                                                    <Link :href="route('admin.show' , {custom:user})">VER </Link>
                                                </VButton>
                                                <VButton type="button" class="ml-4" >
                                                    <Link :href="route('admin.edit' , {custom:user})">EDIT</Link>
                                                </VButton>
                                                <VButton type="button" class="ml-4" >
                                                    <Link method="DELETE" :href="route('admin.destroy' , {custom:user})">ELIM </Link>
                                                </VButton>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    import VButton from '@/Components/PrimaryButton.vue';
</script>

<script>
export default {
    props:['users','custom','u'],
}
</script>