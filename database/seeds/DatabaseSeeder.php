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

    	DB::table('course_categories')->insert([
            'name' => 'Business',
            'order_by' => '1',
            'status' => '1',
        ]);
                    DB::table('courses')->insert([
                        'course_category_id' => '1',
                        'name' => 'Certificate IV in Business',
                        'description' => 'This is a diploma for people planning careers as a coordinator, project team leader or supervisor.

You build generalist business skills and knowledge in management that can be applied across different industry sectors.

This course is also designed for people intending to do further study at degree level in business.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '52 weeks (36 weeks study)' ,
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '1',
                        'status' => '1',
                    ]);

                                	DB::table('course_assessments')->insert([
                                        'course_id' => '1',
                                        'description' => 'Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                    ]);
                                	DB::table('course_rpls')->insert([
                                        'course_id' => '1',
                                        'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
                                    ]);

                    DB::table('courses')->insert([
                        'course_category_id' => '1',
                        'name' => 'Diploma Of Business',
                        'description' => 'This is an entry level course for people working in all types of businesses as administrators and officers including project officers. In these roles, staff need well developed technology, administration and generalist business, marketing or product skills and knowledge.

Gain the fundamental skills and knowledge to successfully perform a wide range of duties in a diverse range of industries.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '12 weeks',
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '2',
                        'status' => '1',
                    ]);

                                         	DB::table('course_assessments')->insert([
                                                'course_id' => '2',
                                                'description' => 'Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '2',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
                                            ]);


                                
                    DB::table('courses')->insert([
                        'course_category_id' => '1',
                        'name' => 'Advanced Diploma Of Business',
                        'description' => 'This qualification reflects the role of individuals with significant experience in a senior administrative role who are seeking to develop expertise across a wider range of business functions.

The qualification is suited to individuals who possess significant theoretical business skills and knowledge and wish to consolidate and build pathways to further educational or employment opportunities.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '52 weeks',
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '3',
                        'status' => '1',
                    ]);

                                           DB::table('course_assessments')->insert([
                                                'course_id' => '3',
                                                'description' => 'Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '3',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
                                            ]);


    	DB::table('course_categories')->insert([
            'name' => 'Accounting',
            'order_by' => '2',
            'status' => '1',
        ]);

                     DB::table('courses')->insert([
                        'course_category_id' => '2',
                        'name' => 'Certificate IV in Accounting and Bookkeeping',
                        'description' => 'This is an entry course for people planning a career in financial services.

At this level, your role is expected to be a practical accounting support position such as accounts clerk, book-keeper, payroll clerk or similar routine support position.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '52 weeks',
                        'study_method' => 'Video',
                        'onshore_fee' => '$2000',
                        'offshore_fee' => '$2800',
                        'order_by' => '1',
                        'status' => '1',
                    ]);
                                         DB::table('course_assessments')->insert([
                                                'course_id' => '4',
                                                'description' => '
Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '4',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours).',
                                            ]);

                        DB::table('courses')->insert([
                        'course_category_id' => '2',
                        'name' => 'Diploma Of Accounting',
                        'description' => 'This is a diploma for people planning a career in financial services in a responsible operational role or for people intending to do further study at degree level in accountancy or business.

Positions could be in accounts and finance departments in medium to large businesses, and government organisations. ',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '64 weeks',
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '2',
                        'status' => '1',
                    ]);

                                      DB::table('course_assessments')->insert([
                                                'course_id' => '5',
                                                'description' => '
Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.
',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '5',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours).',
                                            ]);

                    DB::table('courses')->insert([
                        'course_category_id' => '2',
                        'name' => 'Advanced Diploma Of Accounting',
                        'description' => 'This qualification is designed to reflect the role of individuals working in accounting and seeking professional identification.

At this level individuals are expected to apply theoretical and technical skills in a range of situations and to display initiative and judgement in planning activities. They have autonomy in performing complex operations and can be responsible for planning, coordinating and evaluating the work of others within broad but generally well defined parameters.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '78 weeks',
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '3',
                        'status' => '1',
                    ]);
                                  DB::table('course_assessments')->insert([
                                                'course_id' => '6',
                                                'description' => '
Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.
',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '6',
                                                'description' => '
Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours).',
                                            ]);




    	DB::table('course_categories')->insert([
            'name' => 'Information Technology',
            'order_by' => '3',
            'status' => '1',
        ]);

                            DB::table('courses')->insert([
                        'course_category_id' => '3',
                        'name' => 'Certificate IV in IT Networking',
                        'description' => 'This qualification provides the skills and knowledge for an individual to install and manage small scale networks, either as an independent network support technician or as part of a team.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '52 weeks',
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '1',
                        'status' => '1',
                    ]);
                            DB::table('courses')->insert([
                        'course_category_id' => '3',
                        'name' => 'Diploma IT Networking',
                        'description' => 'This qualification provides the skills and knowledge for an individual to manage, as an independent ICT specialist or as part of a team, the installation of a range of networks, including internetworking, security and e-business integration.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '52 weeks (36 Weeks Study Period)',
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '2',
                        'status' => '1',
                    ]);
                            DB::table('courses')->insert([
                        'course_category_id' => '3',
                        'name' => 'Advanced Diploma of Network Security',
                        'description' => 'This qualification provides the skills and knowledge for an individual to plan, design, manage and monitor an enterprise information and communications technology (ICT) network as an independent ICT specialist or as part of a team responsible for advanced ICT network

security systems. The qualification has a high-level ICT technical base with appropriate security units and the ability to specialise in a number of areas, including voice, wireless, network infrastructure and sustainability.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '52 weeks',
                        'study_method' => 'Video',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '3',
                        'status' => '1',
                    ]);
    	DB::table('course_categories')->insert([
            'name' => 'Health Science',
            'order_by' => '4',
            'status' => '1',
        ]);
    	DB::table('course_categories')->insert([
            'name' => 'Leadership and Management',
            'order_by' => '5',
            'status' => '1',
        ]);

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
        	DB::table('agent_informations')->insert([
            'pan' => '1Qaw2',
            'first_name' => 'Shankar',
            'last_name' => 'Khatri',
            'mobile_no' => '+9779856033776',
            'email' => 'shankar.bdrg@gmail.com',
            'address' => 'Chipledhunga, (Opp: Ratna Emporium) Pokhara Sub-Metropolitan City-4, Kaski, Nepal ',
            'start_date' => '2018-02-14',
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

}
}