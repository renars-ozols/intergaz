<script setup>
import {Head} from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    client: Object,
    deliveries: Object
});

</script>
<template>
    <Head :title="'Client ' + client.id"/>

    <GuestLayout>
        <div class="max-w-7xl mx-auto mt-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg overflow-x-auto">
                <div>
                    <div class="flex justify-center">
                        <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                            <div class="py-3 px-6 border-b border-gray-300">
                                {{ client.name }}
                            </div>
                            <div class="p-6">
                                <h5 class="text-gray-900 text-xl font-medium mb-2">Details</h5>
                                <p class="text-gray-700 text-base mb-4">
                                    Phone: {{ client.phone }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Email: {{ client.email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="w-full whitespace-nowrap">
                        <thead>
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">#</th>
                            <th class="pb-4 pt-6 px-6">Piegādes adrese</th>
                            <th class="pb-4 pt-6 px-6">Piegādes datums</th>
                            <th class="pb-4 pt-6 px-6">Preču summa</th>
                            <th class="pb-4 pt-6 px-6">Piegādes status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(delivery, index) in deliveries.data" :key="delivery.id">
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ index + 1 }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ delivery.address.title }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ delivery.date }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ delivery.total.toFixed(2) }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    <span v-if="delivery.status === 1">
                                        nav izpildīts
                                    </span>
                                    <span v-else-if="delivery.status === 2">
                                        izpildīts
                                    </span>
                                    <span v-else>
                                        atcelts
                                    </span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <Pagination class="my-6" :links="deliveries.links"/>
                </div>
            </div>
        </div>
    </GuestLayout>

</template>
