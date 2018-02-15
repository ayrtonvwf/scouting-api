INSERT INTO `period` (`id`, `name`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Auto', '1', '2018-02-10 14:35:50', NULL),
(2, 'Teleop', '2', '2018-02-10 14:35:50', NULL),
(3, 'Climb', '3', '2018-02-10 14:35:58', NULL);

INSERT INTO `question` (`id`, `period_id`, `description`, `question_type_id`, `created_at`, `updated_at`) VALUES
(11, 1, 'Crossed the auto line?', 1, '2018-02-14 17:02:41', NULL),
(12, 1, 'Put a cube on the switch on the auto period?', 1, '2018-02-14 17:02:41', NULL),
(13, 1, 'Put a cube on the scale on the auto period?', 1, '2018-02-14 17:02:41', NULL),
(14, 1, 'Some different strategy on auto period?', 5, '2018-02-14 17:02:41', NULL),
(15, 2, 'How many cubs put on switch on teleop?', 2, '2018-02-14 17:02:41', NULL),
(16, 2, 'How many cubes put on scale on teleop?', 2, '2018-02-14 17:02:41', NULL),
(17, 2, 'How good is its dirigibility?', 3, '2018-02-14 17:02:41', NULL),
(18, 2, 'How many cubes put on exchange?', 2, '2018-02-14 17:02:41', NULL),
(19, 2, 'Climbed without levitate?', 1, '2018-02-14 17:02:41', NULL),
(20, 2, 'Helped others climbing', 1, '2018-02-14 17:02:41', NULL);

INSERT INTO `team` (`id`, `name`, `number`, `enabled`, `verification_date`, `verification_picture`, `created_at`, `updated_at`) VALUES
(1, 'Roosters', 7033, 1, '2018-02-10 00:00:00', NULL, '2018-02-10 09:53:51', NULL),
(2, 'Strike', 6902, 0, NULL, NULL, '2018-02-15 17:08:55', NULL);