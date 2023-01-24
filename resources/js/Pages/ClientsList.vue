<script setup>
import {Head, Link} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import {reactive} from "vue";

const props = defineProps({
    clients: Object,
});

const client = reactive({
    id: null,
    name: null,
    addresses: [],
});

const onClientChange = (event) => {
    const clientObject = props.clients.data.find(clientObject => clientObject.id === Number(event.target.value));
    client.id = clientObject.id;
    client.name = clientObject.name;
    client.addresses = clientObject.addresses;
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
    });
};

</script>
<template>
    <Head title="Klienti"/>

    <GuestLayout>
        <div class="max-w-7xl mx-auto mt-10">
            <div class="bg-white flex justify-between overflow-hidden shadow-xl sm:rounded-lg overflow-x-auto">
                <div>
                    <table class="w-full whitespace-nowrap">
                        <thead>
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">#</th>
                            <th class="pb-4 pt-6 px-6">Vārds</th>
                            <th class="pb-4 pt-6 px-6"></th>
                            <th class="pb-4 pt-6 px-6"></th>
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
                                    <PrimaryButton :value="client.id" @click="onClientChange">
                                        Parādīt adreses
                                    </PrimaryButton>
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    <Link :href="route('clients.show', client)">
                                        <PrimaryButton>
                                            Atvērt piegādes
                                        </PrimaryButton>
                                    </Link>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <Pagination class="my-6" :links="clients.links"/>
                </div>
                <div v-if="client.addresses.length">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">#</th>
                            <th class="pb-4 pt-6 px-6">Adrese</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(address, index) in client.addresses" :key="address.id">
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ index + 1 }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4">
                                    {{ address.title }}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </GuestLayout>

</template>
