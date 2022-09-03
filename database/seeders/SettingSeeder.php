<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [   'name' => 'name',
                'type'=>'string',
                'description'=>'Website name',
                'value'=>'Whale pumpers',
                'setting_group_id'=>'1'
            ],
            [   'name' => 'logo',
                'type'=>'file',
                'description'=>'Logo',
                'value'=>'/uploads/settings/logo.png',
                'setting_group_id'=>'1'
            ],
            [   'name' => 'url',
                'type'=>'string',
                'description'=>'Website Address',
                'value'=>'http://localhost:8000',
                'setting_group_id'=>'1'
            ],

            [   'name' => 'terms',
                'type'=>'textarea',
                'description'=>'Term Of Use',
                'value'=>'<p>
This website should not be considered a solicitation or obligation to buy or make any other type of investment decision. Trading contains substantial risk and is not for every investor. An investor could potentially lose all or more than the initial investment. Risk capital is money that can be lost without jeopardizing ones financial security or life style. Only risk capital should be used for trading and only those with sufficient risk capital should consider trading. By signing this agreement you make a commitment that you take all the responsibility of your trades and never make a sue from the owner or what this website do. we guarantee that you will never be asked for money in this website .
</p>',
                'setting_group_id'=>'1'
            ],
            [   'name' => 'about_us',
                'type'=>'textarea',
                'description'=>'About us',
                'value'=>'<p>About US</p>',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'contact_us',
                'type'=>'textarea',
                'description'=>'Contact us',
                'value'=>'<p>Contact US</p>',
                'setting_group_id'=>'3'
            ],
            [   'name' => 'email',
                'type'=>'string',
                'description'=>'E-mail',
                'value'=>'support@site.com',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'phone',
                'type'=>'string',
                'description'=>'Phone',
                'value'=>'+1 123 456 7892',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'gift_referral_register_cash',
                'type'=>'number',
                'description'=>'Referral gift for registration(Cash)',
                'value'=>'1',
                'setting_group_id'=>'4'
            ],
            [   'name' => 'gift_referral_register_credit',
                'type'=>'number',
                'description'=>'Referral gift for registration(Credit)',
                'value'=>'1',
                'setting_group_id'=>'4'
            ],
            [   'name' => 'withdrawal_min',
                'type'=>'number',
                'description'=>'Withdrawal minimum amount in USD',
                'value'=>'3',
                'setting_group_id'=>'5'
            ],
        ];
        foreach ($settings as $setting)
        {
            Setting::create($setting);
        }
        //
    }
}
