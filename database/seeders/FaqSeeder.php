<?php

namespace Database\Seeders;

use App\Helpers\FactoryHelper;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqTranslation;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // get all faq categories
        $faq_categories = FaqCategory::all();

        $faq_categories->each(function ($faq_category) {
            // get specific category faqs
            $exist_faqs = Faq::whereFaqCategoryId($faq_category->id)->get();

            $faq_count = abs(count($exist_faqs) - config('seederlimit.faq_seeder_limit'));

            //implement seeder logic
            if (count($exist_faqs) < config('seederlimit.faq_seeder_limit')) {
                for ($i = 1; $i <= $faq_count; $i++) {
                    $faq = $this->storeFaq($faq_category);
                    $this->storeEnglishFaq($faq);
                    $this->storeArabicFaq($faq);
                }
            }
        });
    }

    /**
     * Create a new Faq instance or retrieve an existing one for the given FaqCategory.
     *
     * @param  FaqCategory  $faqCategory
     * @return Faq
     */
    public function storeFaq(FaqCategory $faqCategory): Faq
    {
        return Faq::firstOrCreate([
            'faq_category_id' => $faqCategory->id,
            'slug' => fake()->slug(3),
        ]);
    }

    /**
     * Create or update an English translation of the given Faq instance.
     *
     * @param  Faq  $faq
     * @return void
     */
    public function storeEnglishFaq(Faq $faq): void
    {
        $faker = fake('en_US');
        FaqTranslation::firstOrCreate(
            [
                'locale' => 'en',
                'faq_id' => $faq->id,
            ],
            [
                'faq_id' => $faq->id,
                'locale' => 'en',
                'question' => FactoryHelper::language('en_US')->times(3)->catchPhrase(),
                'answer' => FactoryHelper::language('en_US')->times(20)->catchPhrase(),
            ]
        );
    }

    /**
     * Create or update an Arabic translation of the given Faq instance.
     *
     * @param  Faq  $faq
     * @return void
     */
    public function storeArabicFaq(Faq $faq): void
    {
        FaqTranslation::firstOrCreate(
            [
                'locale' => 'ar',
                'faq_id' => $faq->id,
            ],
            [
                'faq_id' => $faq->id,
                'locale' => 'ar',
                'question' => FactoryHelper::language('ar_SA')->times(3)->catchPhrase(),
                'answer' => FactoryHelper::language('ar_SA')->times(10)->catchPhrase(),
            ]
        );
    }
}
