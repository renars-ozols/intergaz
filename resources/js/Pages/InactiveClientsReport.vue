<script setup>
import {Head} from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    clients: Object
});

</script>
<template>
    <Head title="Atskaite - Pasūtijumu tipi"/>

    <GuestLayout>
        <div class="max-w-7xl mx-auto mt-10">
            <div class="bg-white flex justify-between overflow-hidden shadow-xl sm:rounded-lg overflow-x-auto">
                <div>
                    <table class="w-full whitespace-nowrap">
                        <thead>
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">#</th>
                            <th class="pb-4 pt-6 px-6">Klienta nosaukums</th>
                            <th class="pb-4 pt-6 px-6">Piegādes adrese</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(client, index) in clients.data" :key="client.id">
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ index + 1 }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ client.name }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ client.title }}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <Pagination class="my-6" :links="clients.links"/>
                </div>
            </div>
        </div>
    </GuestLayout>

</template>
