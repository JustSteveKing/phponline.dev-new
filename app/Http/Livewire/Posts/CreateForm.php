<?php

declare(strict_types=1);

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\View\View;
use Infrastructure\Publishing\Contracts\Factories\PostFactoryContract;
use Infrastructure\Publishing\Contracts\Services\PostAggregateServiceContract;
use Livewire\Component;

class CreateForm extends Component implements HasForms
{
    use InteractsWithForms;

    public bool $moderation = false;
    public null|string $title = null;
    public null|string $description = null;
    public null|string $content = null;
    public null|int $category = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function submit(
        PostFactoryContract $factory,
        PostAggregateServiceContract $service,
    ) {
        $service->createPost(
            $factory->make(
                attributes: array_merge(
                    $this->form->getState(),
                    ['user_id' => auth()->id()],
                )
            )
        );

        return redirect()->route('dashboard');
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(4)->schema([
                TextInput::make('title')->label('Post Title')->columnSpan(2)->required(),
                Select::make('category')->label('Post Category')->options(Category::get()->pluck('title', 'id'))->columnSpan(2)->required(),
                TextInput::make('description')->label('Post Description')->columnSpan(4)->required()->maxLength(120),
                MarkdownEditor::make('content')->label('Post Content')->columnSpan(4)->required(),
                    Toggle::make('moderation')->label('Submit for moderation')->columnSpan(4),
                ]),
        ];
    }

    public function render(): View
    {
        return view('livewire.posts.create-form');
    }
}
