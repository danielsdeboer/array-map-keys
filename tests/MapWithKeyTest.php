<?php

namespace Aviator\MapWithKeys\Tests;

use PHPUnit\Framework\TestCase;

class MapWithKeyTest extends TestCase
{
    /** @test */
    public function it_exists ()
    {
        $this->assertTrue(
            function_exists('array_map_keys')
        );
    }

    /** @test */
    public function it_takes_an_array_and_a_function_and_returns_an_array ()
    {
        $array = array_map_keys([], function () {});

        $this->assertInternalType('array', $array);
    }

    /** @test */
    public function it_maps_over_the_array_with_keys ()
    {
        $results = array_map_keys(['test'], function ($key, $value) {
            return [$value => $value];
        });

        $expected = ['test' => 'test'];

        $this->assertSame($expected, $results);
    }

    /** @test */
    public function if_multiple_keys_are_returned_it_uses_the_first ()
    {
        $results = array_map_keys(['test'], function ($key, $value) {
            return [$value => $value, 'dontKeep' => 'dontKeep'];
        });

        $expected = ['test' => 'test'];

        $this->assertSame($expected, $results);
    }

    /** @test */
    public function it_works_with_numeric_keys ()
    {
        $results = array_map_keys(['test'], function ($key, $value) {
            return [$key => $value];
        });

        $expected = [0 => 'test'];

        $this->assertSame($expected, $results);
    }
    
    /** @test */
    public function it_runs_the_callback_against_multiple_items ()
    {
        $input = ['test', 'array', 'of', 'items'];
        $callback = function ($key, $value) {
            return [$value . '-test' => $value];
        };

        $results = array_map_keys($input, $callback);

        $expected = [
            'test-test' => 'test',
            'array-test' => 'array',
            'of-test' => 'of',
            'items-test' => 'items'
        ];

        $this->assertSame($expected, $results);
    }

    /** @test */
    public function input_arrays_may_be_any_length ()
    {
        $input = [
            'key1' => [
                'name' => 'Some Name',
                'email' => 'some@email.com'
            ],

            'key2' => [
                'name' => 'Some OtherName',
                'email' => 'some@otherEmail.com'
            ]
        ];

        $callback = function ($key, $value) {
            return [$value['name'] => $value['email']];
        };

        $results = array_map_keys($input, $callback);

        $expected = [
            'Some Name' => 'some@email.com',
            'Some OtherName' => 'some@otherEmail.com'
        ];

        $this->assertSame($expected, $results);
    }
}