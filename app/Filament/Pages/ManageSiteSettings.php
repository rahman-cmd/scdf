<?php

namespace App\Filament\Pages;

use App\Filament\Support\SiteImageUpload;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Components\Attributes\Unexposed;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageSiteSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $title = 'Site Settings';

    protected static ?string $slug = 'site-settings';

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::current()->attributesToArray());
    }

    #[Unexposed]
    public function defaultForm(Schema $schema): Schema
    {
        return $schema
            ->operation('edit')
            ->model(SiteSetting::current())
            ->statePath('data');
    }

    #[Unexposed]
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Settings')
                    ->persistTabInQueryString()
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Brand')->schema([
                            SiteImageUpload::make('logo', 'uploads/site', 'Header logo')
                                ->helperText('Shown in the site header and admin panel. JPG, PNG, WEBP, or GIF (max 8MB).'),
                            SiteImageUpload::make('footer_logo', 'uploads/site', 'Footer logo')
                                ->helperText('Shown on the dark footer. Prefer a light/white version. JPG, PNG, WEBP, or GIF (max 8MB).'),
                        ]),
                        Tab::make('Hero')->schema([
                            TextInput::make('hero_eyebrow')->label('Eyebrow'),
                            TextInput::make('hero_title_line_1')->label('Title line 1')->required(),
                            TextInput::make('hero_title_line_2')->label('Title line 2')->required(),
                            Textarea::make('hero_body')->label('Body')->rows(4)->columnSpanFull(),
                            SiteImageUpload::make('hero_image', 'uploads/site', 'Hero image'),
                        ]),
                        Tab::make('About')->schema([
                            TextInput::make('about_eyebrow')->label('Eyebrow'),
                            TextInput::make('about_title')->label('Title')->required(),
                            Textarea::make('about_body')->label('Body')->rows(5)->columnSpanFull(),
                            SiteImageUpload::make('about_image', 'uploads/site', 'About image'),
                            TextInput::make('about_image_alt')->label('Image alt')->columnSpanFull(),
                        ]),
                        Tab::make('Programs')->schema([
                            TextInput::make('programs_eyebrow')->label('Eyebrow'),
                            TextInput::make('programs_title')->label('Title')->required(),
                            Textarea::make('programs_intro')->label('Intro')->rows(3)->columnSpanFull(),
                        ]),
                        Tab::make('Impact')->schema([
                            TextInput::make('impact_eyebrow')->label('Eyebrow'),
                            TextInput::make('impact_title')->label('Title')->required(),
                            Textarea::make('impact_body')->label('Body')->rows(3)->columnSpanFull(),
                            SiteImageUpload::make('impact_image', 'uploads/site', 'Impact image'),
                            TextInput::make('impact_callout_line_1')->label('Callout line 1'),
                            TextInput::make('impact_callout_line_2')->label('Callout line 2'),
                        ]),
                        Tab::make('Projects')->schema([
                            TextInput::make('projects_eyebrow')->label('Eyebrow'),
                            TextInput::make('projects_title')->label('Title')->required(),
                            Textarea::make('projects_intro')->label('Intro')->rows(3)->columnSpanFull(),
                        ]),
                        Tab::make('Donate')->schema([
                            TextInput::make('donate_eyebrow')->label('Eyebrow'),
                            TextInput::make('donate_title')->label('Title')->required(),
                            Textarea::make('donate_body')->label('Body')->rows(4)->columnSpanFull(),
                            SiteImageUpload::make('donate_image', 'uploads/site', 'Donate image'),
                            TextInput::make('payment_bkash')->label('bKash number')->tel()->placeholder('01XXXXXXXXX'),
                            TextInput::make('payment_nagad')->label('Nagad number')->tel()->placeholder('01XXXXXXXXX'),
                            TextInput::make('payment_rocket')->label('Rocket number')->tel()->placeholder('01XXXXXXXXX'),
                            TextInput::make('payment_upay')->label('Upay number')->tel()->placeholder('01XXXXXXXXX'),
                            TextInput::make('payment_note')
                                ->label('Payment note')
                                ->placeholder('Send Money (Personal). Use your name as reference.')
                                ->columnSpanFull(),
                        ]),
                        Tab::make('CTA')->schema([
                            TextInput::make('cta_title')->label('Title')->required(),
                            Textarea::make('cta_body')->label('Body')->rows(3)->columnSpanFull(),
                            SiteImageUpload::make('cta_image', 'uploads/site', 'CTA image'),
                        ]),
                        Tab::make('Contact')->schema([
                            TextInput::make('contact_website')->label('Website URL'),
                            TextInput::make('contact_email')->label('Email')->email(),
                            TextInput::make('contact_location')->label('Location'),
                            TextInput::make('contact_location_note')->label('Location note'),
                            TextInput::make('social_facebook')->label('Facebook URL'),
                            TextInput::make('social_youtube')->label('YouTube URL'),
                            TextInput::make('social_linkedin')->label('LinkedIn URL'),
                            TextInput::make('footer_tagline')->label('Footer tagline')->columnSpanFull(),
                            TextInput::make('footer_mission')->label('Footer mission line')->columnSpanFull(),
                        ]),
                    ]),
            ]);
    }

    public function save(): void
    {
        SiteSetting::current()->update($this->form->getState());

        Notification::make()
            ->title('Site settings saved')
            ->success()
            ->send();
    }

    #[Unexposed]
    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getFormContentComponent(),
            ]);
    }

    #[Unexposed]
    public function getFormContentComponent(): Component
    {
        return Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make([
                    Action::make('save')
                        ->label('Save settings')
                        ->submit('save')
                        ->keyBindings(['mod+s']),
                ]),
            ]);
    }
}
