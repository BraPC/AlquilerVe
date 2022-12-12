<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import SideBar from '@/Components/SideBar.vue';
import Footer from '@/Components/Footer.vue';
</script>

<template>
    <SideBar>
    <template #tema>
        <AppLayout title="INICIO">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                INICIO
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                    
                </div>
            </div>
        </div>
    </AppLayout>
    </template>
    </SideBar>
    <Footer></Footer>
</template>
