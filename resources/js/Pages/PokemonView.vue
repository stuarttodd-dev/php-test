<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue'

const props = defineProps({
  pokemon: {
    type: Object,
  },
});

const pokemon = ref(props.pokemon);

</script>

<template>

    <AppLayout title="Pokemon">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pokemon Data Centre
            </h2>
        </template>

        <div class="py-12">

          <div class="bg-white">
            <div class="pb-16 pt-6 sm:pb-24">
              <nav aria-label="Breadcrumb" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                  <li>
                    <div class="flex items-center">
                      <a :href="route('list')" class="mr-4 text-sm font-medium text-gray-900">Home</a>
                      <svg viewBox="0 0 6 20" aria-hidden="true" class="h-5 w-auto text-gray-300">
                        <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                      </svg>
                    </div>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <a href="#" class="mr-4 text-sm font-medium text-gray-500">{{ pokemon.name }}</a>
                    </div>
                  </li>
                </ol>
              </nav>
              <div class="mx-auto mt-8 max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="lg:grid lg:auto-rows-min lg:grid-cols-12 lg:gap-x-8">
                  <div class="mt-2 lg:col-span-5">
                    <div class="mt-2 pt-2 border-t border-gray-200">
                      <h1 class="text-xl font-medium text-gray-900">{{ pokemon.name }}</h1>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-200 flex justify-center">
                      <img v-if="pokemon.sprites['back_default']" :src="pokemon.sprites['back_default']" :alt="pokemon.name + ' Back Default'" class="lg:col-span-2 lg:row-span-2 w-1/2 mr-2" />
                      <img v-if="pokemon.sprites['front_default']" :src="pokemon.sprites['front_default']" :alt="pokemon.name + ' Front Default'" class="lg:col-span-2 lg:row-span-2 w-1/2 ml-2" />
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-200">
                      <h2 class="text-sm font-medium text-gray-900">Species</h2>
                      <div class="prose prose-sm mt-4 text-gray-500" v-html="pokemon.species.name" />
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-200">
                      <h2 class="text-sm font-medium text-gray-900">Height</h2>
                      <div class="prose prose-sm mt-4 text-gray-500" v-html="pokemon.height" />
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-200">
                      <h2 class="text-sm font-medium text-gray-900">Weight</h2>
                      <div class="prose prose-sm mt-4 text-gray-500" v-html="pokemon.weight" />
                    </div>
                  </div>
                  <div class="mt-2 lg:col-span-5">

                    <div class="mt-2 pt-2 border-t border-gray-200">
                      <h1 class="text-xl font-medium text-gray-900">Abilities</h1>
                      <div class="prose prose-sm mt-4 text-gray-500">
                        <ul>
                          <li v-for="(abilityData, index) in pokemon.abilities" :key="index">
                            <p>Name: {{ abilityData.ability.name }}</p>
                            <p>URL: <a :href="abilityData.ability.url">{{ abilityData.ability.url }}</a></p>
                            <p v-if="abilityData.is_hidden">Hidden Ability</p>
                            <p>Slot: {{ abilityData.slot }}</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </AppLayout>
</template>
