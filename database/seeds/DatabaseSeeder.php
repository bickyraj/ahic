<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CourseTableSeeder::class,
            AgentTableSeeder::class,
        ]);

        $intakes =[
            ['year' => '2018' ,'date' =>' 22 Jan'],
            ['year' => '2018' ,'date' =>' 26 Feb'],
            ['year' => '2018' ,'date' =>' 23 Apr'],
            ['year' => '2018' ,'date' =>' 28 May'],
            ['year' => '2018' ,'date' =>' 16 Jul'],
            ['year' => '2018' ,'date' =>' 20 Aug'],
            ['year' => '2018' ,'date' =>' 15 Oct'],
            ['year' => '2018' ,'date' =>' 19 Nov'],
            ['year' => '2019' ,'date' =>' 21 Jan'],
            ['year' => '2019' ,'date' =>' 25 Feb'],
            ['year' => '2019' ,'date' =>' 22 Apr'],
            ['year' => '2019' ,'date' =>' 27 May'],
            ['year' => '2019' ,'date' =>' 15 Jul'],
            ['year' => '2019' ,'date' =>' 19 Aug'],
            ['year' => '2019' ,'date' =>' 14 Oct'],
            ['year' => '2019' ,'date' =>' 18 Nov'],
            ['year' => '2020' ,'date' =>' 20 Jan'],
            ['year' => '2020' ,'date' =>' 24 Feb'],
            ['year' => '2020' ,'date' =>' 20 Apr'],
            ['year' => '2020' ,'date' =>' 25 May'],
            ['year' => '2020' ,'date' =>' 13 Jul'],
            ['year' => '2020' ,'date' =>' 17 Aug'],
            ['year' => '2020' ,'date' =>' 12 Oct'],
            ['year' => '2020' ,'date' =>' 16 Nov'],
        ];


        foreach($intakes as $intake){
            DB::table('application_date_of_intakes')->insert($intake);
        };
         
                            
        // add admin to users table.
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'firstname' => 'admin',
            'lastname' => 'admin',
            'role_id' => 1,
            'password' => bcrypt('test123'),
        ]);

        DB::table('course_unit_categories')->insert([
            'name' => 'Core Units',
            'order_by' => 1,
            'status' => 1,
        ]);
        DB::table('course_unit_categories')->insert([
            'name' => 'Elective Units',
            'order_by' => 1,
            'status' => 1,
        ]);

        // add admin role to roles table
        DB::table('roles')->insert([
            'name' => 'admin',
            'status' => 1,
        ]);



        //

        	DB::table('modules')->insert([
            'title' => 'Student Support',
            'display_type' => '1',
            'status' => '1',
             ]);

                        	DB::table('module_contents')->insert([
                                'module_id'=>'1',
                                'title' => 'Orientation To The College And The Course',
                                'description' => 'Student services staff will organise your orientation. On your first day at our college the team will welcome you, answer your questions and give you information about',
                                'status' => '1',
                            ]);
                            DB::table('module_contents')->insert([
                                'module_id'=>'1',
                                'title' => 'Facilities and Equipment',
                                'description' => 'The Australian Harbour International College is maintained with lecture rooms. Facilities and equipments are set-up, checked and maintained regularly to ensure effective',
                                'status' => '1',
                            ]);

    	DB::table('modules')->insert([
            'title' => 'Airport Pickup',
            'display_type' => '1',
            'status' => '1',
        ]);

                               DB::table('module_contents')->insert([
                                'module_id'=>'2',
                                'title' => 'Arrival',
                                'description' => 'Getting around Sydney is very easy. There is ample public transportation including buses, trains and taxis available and these services are clean, fast and safe. For students requiring the College’s assistance to arrange a pick up service from Sydney International Airport upon arrival, please let us know at least 14 days in advance. Our friendly staff will help make sure you arrive safely at your accommodation. (Fee: AU$ 200.00)',
                                'status' => '1',
                            ]);
                               DB::table('module_contents')->insert([
                                'module_id'=>'2',
                                'title' => 'About Sydney',
                                'description' => 'AHIC is in the center of Sydney – just few minutes walk from the (St James, Martin Place, Museum, Town Hall and Wynyard) Railway Station, which allows students the opportunity to enjoy convenient transport facilities, nearby shopping centers, markets, restaurants and entertainment. Sydney provides one of the best environments for unique learning and social experiences. For further Information about living in Sydney, can be found at www.cityofsydney.nsw.gov.au.',
                                'status' => '1',
                            ]);
                               DB::table('module_contents')->insert([
                                'module_id'=>'2',
                                'title' => 'Accomodation',
                                'description' => 'There are a number of websites and resources to make finding shared or private accommodation in Sydney very easy. In addition, AHIC can arrange accommodation for students who need assistance. If you require us to arrange accommodation for you, please let us know at least 14 days before your arrival in Australia. (Fee: AU$ 200.00)

The 2 most popular websites for accommodation are:
www.domain.com.au
www.realestate.com.au ',
                                'status' => '1',
                            ]);

    	DB::table('modules')->insert([
            'title' => 'Useful Links',
            'display_type' => '1',
            'status' => '1',
        ]);

                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Department of Immigration and Border Protection (DIBP)',
                                'description' => 'http://www.border.gov.au/',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Department of Education',
                                'description' => 'https://www.education.gov.au/',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Official Australian Government Website for International Students',
                                'description' => 'https://www.studyinaustralia.gov.au/',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Migration Blog',
                                'description' => 'http://migrationblog.immi.gov.au/',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Job Searching',
                                'description' => 'http://www.seek.com.au/ <br> http://www.gumtree.com.au/ <br> http://www.careerone.com.au/',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'University Ranking',
                                'description' => 'http://www.topuniversities.com/university-rankings',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Research Scholarships',
                                'description' => 'https://education.gov.au/international-postgraduate-research-scholarships',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Australian Taxation Office',
                                'description' => 'https://www.ato.gov.au/',
                                'status' => '1',
                            ]);
                          DB::table('module_contents')->insert([
                                'module_id'=>'3',
                                'title' => 'Accomodation',
                                'description' => 'http://www.domain.com.au/ <br> http://www.realestate.com.au/',
                                'status' => '1',
                            ]);

    	DB::table('modules')->insert([
            'title' => 'Study In Austrailia',
            'display_type' => '1',
            'status' => '1',
        ]);
    	DB::table('modules')->insert([
            'title' => 'Agent List',
            'display_type' => '1',
            'status' => '1',
        ]);

   






$competences = [
    ['unit_code'=>'BSBADM405','description'=>'Organise meeting'],
    ['unit_code'=>'BSBADM405','description'=>'Manage meetings'],
    ['unit_code'=>'BSBADV507','description'=>'Develop a media plan '],
    ['unit_code'=>'BSBPMG522','description'=>'Undertake project work '],
    ['unit_code'=>'BSBMKG501','description'=>'Identify and evaluate marketing opportunities '],
    ['unit_code'=>'BSBHRM506','description'=>'Manage recruitment, selection and Induction Processes '],
    ['unit_code'=>'BSBITU401','description'=>'Design and develop complex text documents'],
    ['unit_code'=>'BSBRSK401','description'=>'Identify risk and apply risk management processes'],
    ['unit_code'=>'BSBADM409','description'=>'Coordinate business resources '],
    ['unit_code'=>'BSBITU402','description'=>'Develop and use complex spreadsheets'],
    ['unit_code'=>'BSBINN301','description'=>'Promote innovation in a team environment'],
    ['unit_code'=>'BSBMKG413','description'=>'Promote products and services'],
    ['unit_code'=>'BSBMKG414','description'=>'Undertake marketing activities '],
    ['unit_code'=>'BSBSMB408','description'=>'Manage personal, family, cultural, business obligations '],
    ['unit_code'=>'BSBWHS401','description'=>'Implement and monitor WHS policies, procedures and programs to meet legislative requirements'],
];

        foreach($competences as $competence){
            DB::table('course_unit_competences')->insert($competence);
        };

        $countries = [
    ['status'=>'1','name'=>'Nepal'],
    ['status'=>'1','name'=>'Austrailia'],
];



        foreach($countries as $country){
            DB::table('countries')->insert($country);
        };

        $a = [
    ['title'=>'BY MAIL','description'=>'<p>Please send to: AHIC<br />Level 4, 114-120 Castlereagh<br />Street, Sydney NSW 2000<br />Australia.</p>'],
    ['title'=>'DIRECT DEPOSIT/TELEGRAPHIC TRANSFER','description'=>'<p>Please quote student name and number for each transaction, Otherwise, AHIC may not be able to trace the payment, which could mean that enrolment may be delayed.</p>'],
    ['title'=>'BANK PAYMENT','description'=>'<p>Bank: Commonwealth Bank<br />Branch Name: Cnr of George &amp; Market St, Sydney NSW 2000 Australia<br />Account Name: Australian Harvard International College<br />BSB: 062 005<br />Account No: 1116 1515<br />Swift Code: CTBAAU2S (for international transfer)</p>'],
    ['title'=>'CREDIT CARD/ CASH PAYMENT','description'=>'<p>Credit Cards are accepted and surcharges apply according to the type of card. We accept Bankcards, MasterCard &amp; Visa Card. Cash payment is not accepted.</p>'],
    ['title'=>'PAYMENT ADVICE','description'=>'<p>Contact AHIC Accounts for details: accounts@ahic.edu.au</p>'],
];



        foreach($a as $b){
            DB::table('payment_options')->insert($b);
        };

               	DB::table('branch_locations')->insert([
            'country_id' => '1',
            'location' => 'Kathmandu',
            'status'=>'1',
        ]);
               	DB::table('branch_locations')->insert([
            'country_id' => '1',
            'location' => 'Lalitpur',
            'status'=>'1',

        ]);
               	DB::table('branch_locations')->insert([
            'country_id' => '1',
            'location' => 'Bhaktapur',
            'status'=>'1',

        ]);
               	DB::table('branch_locations')->insert([
            'country_id' => '2',
            'location' => 'Sydney',
            'status'=>'1',

        ]);
               	DB::table('branch_locations')->insert([
            'country_id' => '2',
            'location' => 'Melbourne',
            'status'=>'1',

        ]);
               	DB::table('branch_locations')->insert([
            'country_id' => '2',
            'location' => 'New Wales',
            'status'=>'1',

        ]);




}
}