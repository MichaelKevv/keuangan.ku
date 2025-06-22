<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Income categories
        $incomeCategories = [
            ['name' => 'Gaji', 'type' => 'income', 'color' => '#10B981', 'icon' => 'fas fa-wallet'],
            ['name' => 'Bonus', 'type' => 'income', 'color' => '#059669', 'icon' => 'fas fa-gift'],
            ['name' => 'Investasi', 'type' => 'income', 'color' => '#0EA5E9', 'icon' => 'fas fa-chart-line'],
            ['name' => 'Freelance', 'type' => 'income', 'color' => '#8B5CF6', 'icon' => 'fas fa-briefcase'],
            ['name' => 'Lainnya', 'type' => 'income', 'color' => '#6B7280', 'icon' => 'fas fa-receipt'],
        ];

        // Expense categories
        $expenseCategories = [
            ['name' => 'Makanan & Minuman', 'type' => 'expense', 'color' => '#F59E0B', 'icon' => 'fas fa-utensils'],
            ['name' => 'Transportasi', 'type' => 'expense', 'color' => '#EF4444', 'icon' => 'fas fa-car'],
            ['name' => 'Belanja', 'type' => 'expense', 'color' => '#EC4899', 'icon' => 'fas fa-shopping-cart'],
            ['name' => 'Tagihan', 'type' => 'expense', 'color' => '#DC2626', 'icon' => 'fas fa-file-invoice-dollar'],
            ['name' => 'Hiburan', 'type' => 'expense', 'color' => '#7C3AED', 'icon' => 'fas fa-gamepad'],
            ['name' => 'Kesehatan', 'type' => 'expense', 'color' => '#06B6D4', 'icon' => 'fas fa-pills'],
            ['name' => 'Pendidikan', 'type' => 'expense', 'color' => '#84CC16', 'icon' => 'fas fa-book-open'],
            ['name' => 'Lainnya', 'type' => 'expense', 'color' => '#6B7280', 'icon' => 'fas fa-clipboard-list'],
        ];

        foreach ($incomeCategories as $category) {
            Category::create($category);
        }

        foreach ($expenseCategories as $category) {
            Category::create($category);
        }
    }
}
