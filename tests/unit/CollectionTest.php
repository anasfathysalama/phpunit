<?php

use App\Services\Collection;
use PHPUnit\Framework\TestCase;


class CollectionTest extends TestCase
{


    /** @test */
    public function empty_instance_of_collection_return_no_items(): void
    {
        $collection = new Collection();
        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_to_collection(): void
    {
        $collection = new Collection(['1', 1, 5]);
        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function check_if_collection_is_instance_of_iterator_aggregate(): void
    {
        $collection = new Collection(['1', 1, 5]);
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_iterated(): void
    {
        $collection = new Collection(['1', 1, 5]);
        $items = [];
        foreach ($collection->get() as $item) {
            $items[] = $item;
        }
        $this->assertCount(3, $items);
    }

    /** @test */
    public function can_add_new_items_to_existing_collection(): void
    {
        $collection = new Collection(['one']);
        $collection->add(['two']);
        $this->assertEquals(2, $collection->count());

    }


    /** @test */
    public function can_collection_merged_with_other_collection(): void
    {
        $collection_1 = new Collection(['one', 'two']);
        $collection_2 = new Collection([3, 4]);
        $collection_1->merge($collection_2);

        $this->assertCount(4, $collection_1->get());
        $this->assertEquals(4, $collection_1->count());
    }

}