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
                              {{$page.props.user}}
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
</script>

<script>
export default {
    props:['us'],
}
</script>