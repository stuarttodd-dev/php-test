<?php

it('can access the list route', function () {
    $response = $this->get(route('list'));

    $response->assertStatus(200);
});

it('can access the index route', function () {
    $response = $this->get(route('index', ['pokemon', 'bulbasaur']));

    $response->assertStatus(200);
});