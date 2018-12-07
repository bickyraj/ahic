<?php

use Illuminate\Database\Seeder;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        	DB::table('agent_informations')->insert([
            'pan' => '1Qaw2',
            'first_name' => 'Suresh',
            'last_name' => 'Rai',
            'telephone' => '+97725532677',
            'mobile_no' => '+9779852056315',
            'email' => 'enquiry@edeneac.com',
            'address' => 'Dharan-6, Bhanuchowk, Sunsari, Nepal ',
            'start_date' => '2018-02-14',
        ]);
                        DB::table('agent_documents')->insert([
                        'agent_id' => '1',
                        'company_name' => 'Offshore ',
                        'EOI' => 'Suresh',
                        'ABN' => 'Rai',
                        'reference' => '+97725532677',
                        'qualification' => '+9779852056315',
                        'profile' => 'enquiry@edeneac.com',
                        'location' => 'Lalitpur',
                        'address' => 'Lalitpur',
                        'country' => 'Nepal',
                    ]);


        	DB::table('agent_informations')->insert([
            'pan' => '1Qaw2',
            'first_name' => 'Shankar',
            'last_name' => 'Khatri',
            'mobile_no' => '+9779856033776',
            'email' => 'shankar.bdrg@gmail.com',
            'address' => 'Chipledhunga, (Opp: Ratna Emporium) Pokhara Sub-Metropolitan City-4, Kaski, Nepal ',
            'start_date' => '2018-02-14',
        ]);

        DB::table('agent_documents')->insert([
        'agent_id' => '2',
        'company_name' => 'Onshore ',
        'EOI' => 'Suresh',
        'ABN' => 'Rai',
        'reference' => '+97725532677',
        'qualification' => '+9779852056315',
        'profile' => 'shankar.bdrg@gmail.com',
        'location' => 'Melbourne',
        'address' => 'Melbourne',
        'country' => 'Australia',
    ]);
        	DB::table('agent_informations')->insert([
            'pan' => '1Qaw2',
            'first_name' => 'Gunjan',
            'last_name' => 'Gurung',
            'telephone' => '+97761533049',
            'mobile_no' => '+9779846325805',
            'email' => 'infoaward@ymail.com',
            'address' => 'Mahendrapool-9, Pokhara, Kaski, Nepal ',
            'start_date' => '2018-02-14',
        ]);
        	DB::table('agent_informations')->insert([
            'pan' => '1Qaw2',
            'first_name' => 'Prakash',
            'last_name' => 'Shrestha',
            'telephone' => '+97761531108',
            'mobile_no' => '+97761536902',
            'email' => 'impulseintl@gmail.com ',
            'address' => ' Pokhara-4, Kaski Nepal ',
            'start_date' => '2018-02-14',
        ]);

    }
}
