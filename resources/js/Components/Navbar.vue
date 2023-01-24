<script setup>
import {Link} from '@inertiajs/vue3';
</script>

<template>
    <nav
        class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
        <div class="mb-2 sm:mb-0">
            <a href="/home" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark">Intergaz</a>
        </div>
        <div>
            <Link :href="route('clients.index')"
                  class="rounded bg-indigo-200 text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Klientu
                saraksts
            </Link>
            <Link :href="route('reports.order-types')"
                  class="rounded bg-indigo-200 ext-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Atskaite
                - Pasūtījumu tipi
            </Link>
            <Link :href="route('reports.last-deliveries')"
                  class="rounded bg-indigo-200 text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">
                Atskaite - Pēdējā piegāde
            </Link>
            <Link :href="route('reports.inactive-clients')"
                  class="rounded bg-indigo-200 text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">
                Atskaite - Neaktīvie klienti
            </Link>
        </div>
    </nav>
</template>
