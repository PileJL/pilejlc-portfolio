<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', '')),
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    'about' => 'I am a software engineer dedicated to building high-quality web and mobile application solutions. Alongside my professional web development career, I have been freelancing since 2022, specializing in mobile development and custom robotics projects. I graduated from Camarines Norte State College with a Bachelor of Science in Information Technology.',

    'experiences' => [
        ['Internal Developer', 'Full-time', 'Octagon Express Group', 'https://octagonexpress.co/', 'Feb 2026 - Present'],
        ['Software Engineer', 'Full-time', 'Filzof Innovations', 'https://www.filzofinnovations.com/', 'Aug 2025 - Nov 2025'],
        ['BS Information Technology', '', 'Camarines Norte State College', 'https://cnsc.edu.ph/UCN/', '2021 - 2025'],
        ['Software Developer', 'Internship', 'Upward Solutions Inc.', 'https://www.facebook.com/AiUpwardSolutions', 'Feb 2025 - May 2025'],
        ['Lead Technologist', 'Part-time', 'Upward Solutions Inc.', 'https://www.facebook.com/AiUpwardSolutions', 'Apr 2024 - Dec 2024'],   
    ],
    
    'tech_stack_main' => ['Laravel', 'Livewire', 'Tailwind CSS', 'Alpine.js', 'PHP', 'MySQL', 'Redis', 'Git', 'GitLab / GitHub'],

    'tech_stack_others' => ['Python', 'Java', 'Firebase', 'C++', 'Node.js', 'Next.js', 'JavaScript / TypeScript', 'React', 'couchDB', 'VB.NET', 'Docker'],

    'tech_stack_tools' => ['VS Code', 'Postman', 'Visual Studio IDE', 'Android Studio', 'Arduino IDE', 'Trello', 'JIRA',  'Figma', 'Docker Hub / Desktop' ],

    'recent_projects' => [
        ['FitGate', 'CNSC BPEd Assessment Results Portal', 'https://fitgate.onrender.com/'],
        ['BeatQuest', 'Interactive e-learning 2D Game for MAPEH 5', 'https://1drv.ms/u/c/5c760605806e7973/IQBzeW6ABQZ2IIBcvAAAAAAAAV10-FBj9Ksibw35gCNVfYk?e=smNSv1'],
    ],

    'certificates' => [
        ['Mega Web Development Course', 'Udemy', 'certificates/mega_web_dev.jpg'],
        ['Google AI Essentials', 'Google', 'certificates/google_AI_essentials.png'],
        ['Problem Solving (Basic)', 'HackerRank', 'certificates/problem_solving_basic.png'],
        ['HTML, JavaScript, & Bootstrap Course', 'Udemy', 'certificates/html,js,bootstrap.png'],
        ['Advancing the Academe with AWS', 'VST ECS Phils., Inc', 'certificates/VSTECS_AWS.png'],
        ['CNSC Techno Programming Award', 'Camarines Norte State College', 'certificates/techno_programming.png'],
        ['AppCon 2023', 'OTis Japan Inc.', 'certificates/appcon2023.png'],
        ['Academic Distinction Award', 'Camarines Norte State College', 'certificates/acad_dist.png'],
        ['Best Capstone Award', 'Camarines Norte State College', 'certificates/best_capstone.png'],
        ['Certificate of Internship', 'Upward Solutions Inc.', 'certificates/internship.png'],
        ['Bicol IT Students Congress 2024', 'CODiTE', 'certificates/bitscon.png'],
    ],

    'socials' => [
        ['LinkedIn', 'icons.linkedin', 'https://www.linkedin.com/in/pilejlc/'],
        ['GitHub', 'icons.github', 'https://github.com/PileJL'],
        ['TikTok', 'icons.tiktok', 'https://www.tiktok.com/@jlpile'],
        ['Instagram', 'icons.instagram', 'https://www.instagram.com/jlpile/'],
    ]
];
