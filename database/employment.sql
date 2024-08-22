-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2024 at 07:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employment`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(4048) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `salary` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`, `salary`) VALUES
(1, 'laravel developer', 'laravel.png', 'Minimum 2 years of experience in Core PHP and object-oriented programming.\r\nExperience in developing applications using Laravel or any other MVC frameworks.\r\nShould have an excellent grasp of version control technologies, relational databases, and web service development.\r\nStrong understanding of front-end technologies, such as JavaScript, HTML5, and CSS3\r\nKnowledge of code versioning tools like Git, SVN, and Mercurial\r\nFamiliarity with the limitations of PHP as a platform and its workarounds\r\nIntentional commitment to code quality through bug fixes, refactoring, unit testing, and automation\r\nCreative problem-solving skills with a focus on delivering business value quickly\r\nAn experienced laravel developer is responsible for creating high-quality web applications using the Laravel framework. He also has excellent knowledge of PHP, MySQL, HTML, CSS, and JavaScript. A Laravel developer with complete skills will be able to understand the project requirements and convert them into a working application.', '700'),
(2, 'nodejs', 'nodejs.png', 'Strong proficiency with JavaScript {{or CoffeeScript depending on your technology stack}}\r\nKnowledge of Node.js and frameworks available for it {{such as Express, StrongLoop, etc depending on your technology stack}}\r\nUnderstanding the nature of asynchronous programming and its quirks and workarounds\r\nGood understanding of server-side templating languages {{such as Jade, EJS, etc depending on your technology stack}}\r\nGood understanding of server-side CSS preprocessors {{such as Stylus, Less, etc depending on your technology stack}}\r\nBasic understanding of front-end technologies, such as HTML5, and CSS3\r\nUnderstanding accessibility and security compliance {{Depending on the specific project}}\r\nUser authentication and authorization between multiple systems, servers, and environments\r\nIntegration of multiple data sources and databases into one system\r\nUnderstanding fundamental design principles behind a scalable application\r\nUnderstanding differences between multiple delivery platforms, such as mobile vs. desktop, and optimizing output to match the specific platform\r\nCreating database schemas that represent and support business processes\r\nImplementing automated testing platforms and unit tests\r\nProficient understanding of code versioning tools, such as Git', '800'),
(3, 'reactjs', 'react.png', 'Strong proficiency in JavaScript, including DOM manipulation and the JavaScript object model\r\n\r\nThorough understanding of React.js and its core principles\r\n\r\nExperience with popular React.js workflows (such as Flux or Redux)\r\n\r\nFamiliarity with newer specifications of EcmaScript\r\n\r\nExperience with data structure libraries (e.g., Immutable.js)\r\n\r\nKnowledge of isomorphic React is a plus\r\n\r\nFamiliarity with RESTful APIs\r\n\r\nKnowledge of modern authorization mechanisms, such as JSON Web Token\r\n\r\nFamiliarity with modern front-end build pipelines and tools\r\n\r\nExperience with common front-end development tools such as Babel, Webpack, NPM, etc.\r\n\r\nAbility to understand business requirements and translate them into technical requirements\r\n\r\nA knack for benchmarking and optimization', '450'),
(4, 'Angular', 'angular.png', 'Proficiency with JavaScript and HTML5\r\nProfessional, precise communication skills\r\nDeep knowledge of AngularJS practices and commonly used modules based on extensive work experience\r\nCreating self-contained, reusable, and testable modules and components\r\nEnsuring a clear dependency chain, in regard to the app logic as well as the file system\r\nAbility to provide SEO solutions for single page apps\r\nExtensive knowledge of CSS and JS methods for providing performant visual effects and keeping the framerate above 30fps at all times\r\nThorough understanding of the responsibilities of the platform, database, API, caching layer, proxies, and other web services used in the system\r\nValidating user actions on the client side and providing responsive feedback\r\nWriting non-blocking code, and resorting to advanced techniques such as multi-threading, when needed\r\nCreating custom, general use modules and components which extend the elements and modules of core AngularJS\r\nExperience with all levels of operation available to the front-end, such as from creating XHRs in vanilla JS to using a custom wrapper around $resource\r\nExperience with building the infrastructure for serving the front-end app and assets\r\nArchitecting and automating the build process for production, using task runners or scripts\r\nDocumenting the code inline using JSDoc or other conventions', '900'),
(5, 'Django', 'django.jfif', 'The ability to problem-solve and critically think.\r\nHigh level of knowledge of Python and the Django framework.\r\nFamiliarity with event driven programming as well as the MVC.\r\nGood understanding of SQL databases.\r\nGood understanding of REST APIs.', '650');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint NOT NULL,
  `subscribe` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isAdmin`, `subscribe`) VALUES
(1, 'ahmad', 'ahmadfourthyear@gmail.com', '$2y$10$/uKhfP4BvszIN24IRd5rXeNLD1xgHU1vA2BMf6lVRlT4xkunJt/Jq', 1, 1),
(2, 'mahmoud', 'mahmoudmostafa@gmail.com', '$2y$10$pWAXJW9eYmFZCFSF2ZQs1Ozx/vkGMtFZ.eswfNpNckn1hKJM5DeKu', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
