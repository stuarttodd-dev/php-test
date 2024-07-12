<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {computed, ref, defineProps} from "vue";

const props = defineProps({
  pokemonList: {
    type: Object,
  }
});

const pokemonList = ref(props.pokemonList);

const filteredPokemon = computed(() => {

  if (!name.value.trim()) {
    return pokemonList.value;
  }

  const searchTerm = name.value.trim().toLowerCase();
  return Object.values(pokemonList.value).filter(pokemon =>
      pokemon.name.toLowerCase().includes(searchTerm)
  );

});

const name = ref('');

</script>

<template>

    <AppLayout title="Pokemon">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pokemon Data Centre
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white">
                <div class="relative">
                  <label for="name" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">Filter</label>
                  <input type="text" id="name" v-model="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search by pokemon" />
                </div>

                <div class="mx-auto max-w-2xl px-4 py-2 sm:px-6 lg:max-w-7xl lg:px-8">
                  <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8" v-if="filteredPokemon.length > 0">
                    <div v-for="pokemon in filteredPokemon" :key="pokemon.id" class="group relative">
                      <div class="mt-4 justify-between">
                        <div class="text-center">
                          <h3 class="text-gray-700 font-bold">
                            <a :href="'/pokemon/' + pokemon.name">
                              <span aria-hidden="true" class="absolute inset-0 cursor-pointer" />
                              {{ pokemon.name.replace(/-/g, ' ').replace(/\b\w/g, char => char.toUpperCase()) }}
                            </a>
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="gap-x-6 bg-red-600 px-6 py-2.5 sm:px-3.5 sm:before:flex-1" v-if="filteredPokemon.length == 0">
                    <p class="text-sm leading-6 text-white">
                      No results found using search term <strong>"{{ name }}"</strong>, please try again.
                    </p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </AppLayout>
</template>
