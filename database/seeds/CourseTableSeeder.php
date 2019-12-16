<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

                        DB::table('course_assessments')->insert([
                                                'course_id' => '7',
                                                'description' => '

Assessments may include short written knowledge tests, discussions and oral communication demonstrations , practical demonstration, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.
',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '7',
                                                'description' => '

Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
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


                        DB::table('course_assessments')->insert([
                                                'course_id' => '8',
                                                'description' => '

Assessments may include short written knowledge tests, discussions and oral communication demonstrations , practical demonstration, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.
',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '8',
                                                'description' => '

Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
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


                                            DB::table('course_assessments')->insert([
                                                'course_id' => '9',
                                                'description' => '
This qualification prepares you for work in an aged care facility or community based service providing specialised tasks and functions.

You work within organisational guidelines and maintain quality service delivery including individualised service planning and delivery.
',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '9',
                                                'description' => '
Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);

    	DB::table('course_categories')->insert([
            'name' => 'Health Science',
            'order_by' => '4',
            'status' => '1',
        ]);

                           DB::table('courses')->insert([
                        'course_category_id' => '4',
                        'name' => 'Certificate III in Individual Support',
                        'description' => 'This qualification prepares you for the role of a worker in the community and a residential setting.

You work in an aged care facility or home based community care service. Care staff provide person-centred support to people needing support due to ageing, disability or some other reason.

AHIC graduates complete two specialisation streams in the course.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '52 weeks',
                        'study_method' => '15hrs Face to face + 5hrs Online (Per Week)+120hrs Work Placement in total',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '1',
                        'status' => '1',
                    ]);

                                             DB::table('course_assessments')->insert([
                                                'course_id' => '10',
                                                'description' => 'Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '10',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
                                            ]);

                           DB::table('courses')->insert([
                        'course_category_id' => '4',
                        'name' => 'Certificate IV in Ageing Support',
                        'description' => 'This qualification prepares you for work in an aged care facility or community based service providing specialised tasks and functions.

You work within organisational guidelines and maintain quality service delivery including individualised service planning and delivery.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '78 Weeks (54 Weeks Study)',
                        'study_method' => '15hrs Face to face + 5hrs Online(Per Week) +120hrs workplacement in total',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '2',
                        'status' => '1',
                    ]);


                                            DB::table('course_assessments')->insert([
                                                'course_id' => '11',
                                                'description' => 'Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '11',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
                                            ]);

                           DB::table('courses')->insert([
                        'course_category_id' => '4',
                        'name' => 'Diploma of Nursing',
                        'description' => 'This qualification reflects the role of an enrolled nurse working under supervision of a registered nurse. This qualification covers the application of skills and knowledge required to provide nursing care for people across the health sector. A lifespan approach should underpin this qualification with relevant competencies that relate to the different stages of life identified within the units.

A graduate from a Diploma of Nursing program approved by the Nursing and Midwifery Board of Australia (NMBA) is able to apply for registration with the NMBA as an enrolled nurse. Further information on registration is available at www.nursingmidwiferyboard.gov.au',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '104 weeks (72 weeks study)',
                        'study_method' => '15hrs Face to face + 5hrs Online (Per Week)+120hrs Work Placement in total',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '3',
                        'status' => '1',
                    ]);
                                            DB::table('course_assessments')->insert([
                                                'course_id' => '12',
                                                'description' => 'Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '12',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
                                            ]);


    	DB::table('course_categories')->insert([
            'name' => 'Leadership and Management',
            'order_by' => '5',
            'status' => '1',
        ]);

            DB::table('courses')->insert([
                        'course_category_id' => '5',
                        'name' => 'Diploma of Leadership and Management',
                        'description' => 'This qualification reflects the role of individuals who apply knowledge, practical skills and experience in leadership and management across a range of enterprise and industry contexts.

Individuals at this level display initiative and judgement in planning, organising, implementing and monitoring their own workload and workload of others.',
                        'video_link' => 'http://ahic.edu.au/student-service',
                        'duration' => '78 Weeks (54 Weeks Study Period)',
                        'study_method' => '15 hours On Campus and 5 hours online per week',
                        'onshore_fee' => '$1200',
                        'offshore_fee' => '$1800',
                        'order_by' => '1',
                        'status' => '1',
                    ]);

                           DB::table('course_assessments')->insert([
                                                'course_id' => '13',
                                                'description' => 'Assessments may include short written knowledge tests, discussions and oral communication demonstrations, case study exercises, written reports, web based research and reports, final projects and final written exams. To perform at your best, you will probably need to work on the assessments outside of class time.',
                                            ]);
                                            DB::table('course_rpls')->insert([
                                                'course_id' => '13',
                                                'description' => 'Students who have completed relevant studies or have some of the competencies in the course may apply for Recognition of Prior Learning (RPL). Application for RPL can be made with the initial application or can be made within two weeks of the course commencement using the RPL Application Form and by providing supporting documents. Please note that RPL cannot result in an international student having less than a full time load of study (20 hours per week).',
                                            ]);

    }
}
