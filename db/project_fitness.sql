-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2017 at 02:55 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_admin_details`
--

CREATE TABLE `project_admin_details` (
  `id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_admin_details`
--

INSERT INTO `project_admin_details` (`id`, `email`, `name`, `dob`, `gender`) VALUES
('2017_01_01_02_59_40_pm', 'sscsps@gmail.com', 'Sahil Soni', '1995-09-09', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `project_admin_login`
--

CREATE TABLE `project_admin_login` (
  `id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passhash` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_admin_login`
--

INSERT INTO `project_admin_login` (`id`, `email`, `passhash`) VALUES
('2017_01_01_02_59_40_pm', 'sscsps@gmail.com', '948c4fc2a42b7e6e8ffa6c16cf62537f');

-- --------------------------------------------------------

--
-- Table structure for table `project_body_parts`
--

CREATE TABLE `project_body_parts` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `number_of_exercise` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_body_parts`
--

INSERT INTO `project_body_parts` (`id`, `name`, `number_of_exercise`) VALUES
(5, 'legs', 0),
(1, 'back', 1),
(3, 'Arms', 0),
(4, 'Core', 0),
(6, 'Chest', 10),
(7, 'SHOULDER', 6),
(8, 'BICEPS', 6);

-- --------------------------------------------------------

--
-- Table structure for table `project_customer_details`
--

CREATE TABLE `project_customer_details` (
  `id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_customer_details`
--

INSERT INTO `project_customer_details` (`id`, `email`, `name`, `dob`, `gender`) VALUES
('2017_01_11_07_30_52_pm', 'Ananayssj@gmail.com', 'Ananay', '2017-01-12', 'Male'),
('2017_01_01_02_41_45_pm', 'sscsps@gmail.com', 'Sahil Soni', '1995-09-09', 'Male'),
('2017_01_15_12_27_37_pm', 'sscsps1@gmail.com', 'Sahil Soni', '2013-06-05', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `project_customer_login`
--

CREATE TABLE `project_customer_login` (
  `id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passhash` varchar(32) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_customer_login`
--

INSERT INTO `project_customer_login` (`id`, `email`, `passhash`, `verified`) VALUES
('2017_01_11_07_30_52_pm', 'Ananayssj@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 0),
('2017_01_01_02_41_45_pm', 'sscsps@gmail.com', '948c4fc2a42b7e6e8ffa6c16cf62537f', 1),
('2017_01_15_12_27_37_pm', 'sscsps1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_exercises_list`
--

CREATE TABLE `project_exercises_list` (
  `id` varchar(121) NOT NULL,
  `name` varchar(70) NOT NULL,
  `bodyPart` varchar(50) NOT NULL,
  `instrument` varchar(100) NOT NULL,
  `videoName` text,
  `videoAddress` text,
  `about` text,
  `moreInfo` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_exercises_list`
--

INSERT INTO `project_exercises_list` (`id`, `name`, `bodyPart`, `instrument`, `videoName`, `videoAddress`, `about`, `moreInfo`) VALUES
('back_PullUps', 'Pull Ups', 'back', 'Over Head Bar', '', 'https://www.youtube.com/watch?v=mRznU6pzez0', 'used to make back mussels.', ''),
('Chest_BarbellBenchPress', 'Barbell Bench Press', 'Chest', 'Flat Bench', 'How To: Barbell Bench Press', 'https://www.youtube.com/watch?v=rT7DgCr-3pg', 'the bench press is a great exercise for anyone looking to gain muscle size and strength in the upper body. This exercise is known as a compound exercise, meaning it involves multiple joints, and therefore multiple major muscle groups to execute. The bench press was ranked as the number one chest exercise by the American Council on exercise.', ''),
('Chest_FlatBenchDumbbellPress', 'Flat Bench Dumbbell Press', 'Chest', 'Flat Bench', 'How To: Dumbbell Chest Press ', 'https://www.youtube.com/watch?v=VmB1G1K7v94', 'The Dumbbell Bench Press is a fantastic movement that when properly performed builds the chest muscles. The Dumbbell Bench Press is a great chest exercise because it can be performed using various angles to develop every part of the chest muscle. The Dumbbell Bench Press is also a fantastic chest exercise because it allows for great freedom of motion and as such engages many supporting muscles that further stimulate optimal chest development. ', ''),
('Chest_InclineBarbellBenchPress', 'Incline Barbell Bench Press', 'Chest', 'Incline Bench', 'How to Do an Incline Bench Press | Chest Workout ', 'https://www.youtube.com/watch?v=dtNXLavPFo0', 'The incline bench press is a strength-training move to build your chest and fronts of the shoulders. Incline chest press machines that simulate the movement in a fixed plane are another way to perform the move. The incline press is one of several exercises that help create symmetry and strength in the muscles of the upper body.', ''),
('Chest_DeclineBenchDumbbellPress', 'Decline Bench Dumbbell Press', 'Chest', 'Decline Bench', 'Chest & Back Exercises: Upper Body Workout : Dumbell Decline Bench Press for Your Chest Workout ', 'https://www.youtube.com/watch?v=e3tn_Ta-KOU', 'Turning the dumbbell bench press upside-down, literally, might be just what you need to kick up your chest routine. The lower portion of your chest gets more stimulation, while working with a dumbbell, as opposed to a barbell, provides balance between the sides of your body. Your shoulders and triceps also benefit from the decline dumbbell press.', ''),
('Chest_PushUps', 'Push Ups', 'Chest', 'none', 'How to Do a Push Up Correctly', 'https://www.youtube.com/watch?v=Eh00_rniF8E', 'Push-ups are basic strength-building total body exercises that strengthen the upper body and improve the core strength. Several muscle groups in the chest, arms, shoulder, triceps, back, and neck work simultaneously during a push-up. Push-ups are performed in a prone position, which can help develop a good posture. ', ''),
('Chest_InclineBenchDumbbellPress', 'Incline Bench Dumbbell Press', 'Chest', 'Incline Bench', 'How to Do Incline Dumbbell Bench Press | Chest Workout ', 'https://www.youtube.com/watch?v=07Bcqtib4FM', 'The incline bench press is a strength-training move to build your chest and fronts of the shoulders. Incline chest press machines that simulate the movement in a fixed plane are another way to perform the move. The incline press is one of several exercises that help create symmetry and strength in the muscles of the upper body.', ''),
('Chest_DeclineBarbellBenchPress', 'Decline Barbell Bench Press', 'Chest', 'Decline Bench', 'How To: Barbell Decline Bench Press ', 'https://www.youtube.com/watch?v=LfyQBUKR8SE', 'decline bench press, your body lies on a slope, with your legs higher than your head. Because the angle of your arms is lower relative to your torso than in a standard bench press, the decline bench press primarily targets the lower part of your chest, or pectoral, muscles. The exercise also works your triceps and anterior deltoid muscles..', ''),
('Chest_ButterflyorPec-DeckMachine', 'Butterfly or Pec-Deck Machine', 'Chest', 'Butterfly or Pec-Deck Machine', 'How to Do Pec Deck Butterflies ', 'https://www.youtube.com/watch?v=Qr7dstCeYtw', 'The chest area includes the pec muscles (pectoralis major and minor), and when you do a chest fly, you also use other muscles such as the deltoids to help stabilize the movement. It is a great move to shape and strengthen your chest area (which in turn helps alleviate back problems!)', ''),
('Chest_DipsForChest', 'Dips For Chest', 'Chest', 'parallel bars', 'How To Do Dips - Chest & Triceps Exercise ', 'https://www.youtube.com/watch?v=wjUmnZH528Y', 'One of the best exercises you can perform to build the chest, triceps and shoulders, parallel bar dips train these muscles in a completely different angle and range of motion than push-ups and bench pressing', ''),
('Chest_Pull-Over', 'Pull-Over', 'Chest', 'Flat Bench', 'How to Do a Dumbbell Pullover | Back Workout ', 'https://www.youtube.com/watch?v=zUVzVXMh9Nc', 'The Dumbbell Pullover is an advanced movement that when performed properly will hit the chest at a different angles and employ muscle fibers not normally recruited standard chest building movements such as the bench press, Pec Deck and flyes. The Dumbbell Pullover when done properly also  help expand your rib cage. Employing the Dumbbell Pullover as part of your chest workout will aid in the full development of your chest pectorals. ', ''),
('SHOULDER_BarbellPushPress', 'Barbell Push Press', 'SHOULDER', 'barbell and weights', 'Exercise Demo: Barbell Push Press', 'https://www.youtube.com/watch?v=DFgD99zh028', 'One of the most effective way to build muscle and power is PUSH PRESS. The push press calls on the calves, quads, core, deltoids, and triceps as prime movers and a host of other muscles that stabilize and assist. Contrary to the grinding reps of heavy strict overhead presses, this lift is explosive and classified as a â€œquick liftâ€.', ''),
('SHOULDER_ArnoldPress', 'Arnold Press', 'SHOULDER', 'Dumbells and bench to sit', 'Arnold Press ', 'https://www.youtube.com/watch?v=odhXwoS3mDA', 'Arnold Dumbbell Presses are a slightly awkward exercise, but it is very beneficial because it hits the front and side heads of your delts. Arnold Presses, shoulder press variation, shows how you can work the different heads of the deltoids and get some unique muscle building benefits.', ''),
('SHOULDER_FrontDumbbellRaise', 'Front Dumbbell Raise', 'SHOULDER', 'Dumbbells', 'How To: Dumbbell Front Raise ', 'https://www.youtube.com/watch?v=-t7fuZ0KhDA', 'People looking to just maintain strength might perform only five or six basic exercises to achieve their goal. The front raise is an exercise that fits into any workout and it involves the upper body musculature.', ''),
('SHOULDER_UprightRow', 'Upright Row', 'SHOULDER', 'over head bar', 'How To: Barbell Upright Row ', 'https://www.youtube.com/watch?v=amCU-ziHITM', 'Enter the upright rowâ€”a seriously efficient move that targets your side deltoids and trapezius muscles as its prime movers as well as your front delts, rhomboids, and teres minor as synergists. By adding this lift to your repertoire, youâ€™ll nail the majority of your shoulder and upper back muscles with one underutilized compound movement.', ''),
('BICEPS_DumbbellCurl', 'Dumbbell Curl', 'BICEPS', 'Dumbbells', 'How To: Alternating Dumbbell Curl ', 'https://www.youtube.com/watch?v=sAq_ocpRh_I', 'The biceps curl is an exercise for the elbow flexors, which comprise the biceps brachii, brachialis and brachioradialis. You can emphasize each of these muscles by using a variety of grips. It is best to do biceps curls using dumbbells to ensure the elbow flexors of each arm are being worked to the same extent. Also, when you use dumbbells, it is best you do the biceps curls unilaterally, meaning one side at a time. By doing so, you can focus on one side at a time and better stimulate the muscles.', ''),
('BICEPS_Barbellcurl', 'Barbell curl', 'BICEPS', 'Barbell + weights', 'How To: Straight-Bar Bicep Curl ', 'https://www.youtube.com/watch?v=sAq_ocpRh_I', 'A barbell curl is a pull-type, isolation exercise which works primarily your biceps, but also trains muscles in your forearms and shoulders to some degree, as well. â€.', ''),
('BICEPS_Concentrationcurls', 'Concentration curls', 'BICEPS', 'Dumbbells', 'How To: Dumbbell Concentration Curl ', 'https://www.youtube.com/watch?v=Jvj2wV0vOYU', 'Concentration curls use dumbbells to isolate the biceps, concentrating the workload on the lateral head of the biceps brachii and brachialis (the outer bicep).Concentration curls are often used towards the end of a workout to get a real â€˜pumpâ€™ in the bicepsâ€.', ''),
('BICEPS_Close-GripChin-Up', 'Close-Grip Chin-Up', 'BICEPS', 'overhead bar ', 'Best Exercise For Bigger Biceps Fast = Close Grip Chin-ups ', 'https://www.youtube.com/watch?v=6bTcFTRoqcw', 'The movement also requires a hefty dose of biceps strength to bend your elbows as you hoist your bodyweight. Turning your grip so your palms face you in a shoulder-width or closer grip and using a full range of motion really hits the biceps brachii.â€.', ''),
('BICEPS_StandingCableCurl', 'Standing Cable Curl', 'BICEPS', 'a cable and your choice of attachment', 'How To: Standing Cable Double-Bicep Curl', 'https://www.youtube.com/watch?v=L9GwtjwAM8Y', 'Area Targeted: Biceps brachii, with brachialis activation using a rope.', ''),
('SHOULDER_StandingMilitaryPress', 'Standing Military Press ', 'SHOULDER', 'barbell and weights', 'Standing Military Press - Shoulder Exercise - Bodybuilding.com ', 'https://www.youtube.com/watch?v=8E4oWpi0RkA', 'This is essentially a push press without the extra bit of body English generated through your legs. That makes it a better isolation movement, but this movement still isn\'t considered an isolation exercise. In fact, it\'s a highly demanding multijoint overhead press that, because it\'s not seated, still allows for a bit of momentum as well as increased muscle activation ', ''),
('SHOULDER_DumbbellLateralRaise', 'Dumbbell Lateral Raise', 'SHOULDER', 'Dumbbells', 'How To: Dumbbell Side Lateral Raise ', 'https://www.youtube.com/watch?v=3VcKaXpzqRo', 'The dumbbell lateral raise enhances your physique\'s appearance by creating size contrasts between your shoulders, waist and hips. The exercise has the same effect as wearing shoulder pads on a blouse or jacket. By making your shoulders appear wider, your waist and hips appear slimmer. The dumbbell lateral raise also works the muscles that support and stabilize your shoulders.', ''),
('BICEPS_DumbbellHammerCurl', 'Dumbbell Hammer Curl ', 'BICEPS', 'Dumbbells', 'How To: Dumbbell Hammer Curl ', 'https://www.youtube.com/watch?v=zC3nLlEvin4', 'Build Bigger Bicep Peak With Dumbbell Hammer Curls On The Preacher Bench. When it comes to building bicep peak 2 of the best exercises you can use are the Hammer Curl and the Preacher Curl. Hammer Curls help work the brachialis, which is that â€œbumpâ€ of a muscle that\'s between the biceps and tricepsâ€.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_body_parts`
--
ALTER TABLE `project_body_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_customer_details`
--
ALTER TABLE `project_customer_details`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `project_customer_login`
--
ALTER TABLE `project_customer_login`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `project_exercises_list`
--
ALTER TABLE `project_exercises_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_body_parts`
--
ALTER TABLE `project_body_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
