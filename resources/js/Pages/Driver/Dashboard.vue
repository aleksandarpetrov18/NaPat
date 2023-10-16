<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="tamn" class="p-6 text-gray-900">DRIVER</div>
                    <button @click="smeniVrednost()">click</button>
                    <li v-for="item in niza">
                      {{ item }}
                    </li>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
export default {
  data() {
    return {
     tamn: true,
     niza: ['1','2','3'],
     data:[]
    };
  },
  methods: {
  
  }
};
</script>
