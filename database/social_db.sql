-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Iun 2017 la 09:57
-- Versiune server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_db`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Salvarea datelor din tabel `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`) VALUES
(3, 'Habar n-am. Mai incearca', 6, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Salvarea datelor din tabel `friends`
--

INSERT INTO `friends` (`id`, `user_id1`, `user_id2`, `date`) VALUES
(1, 1, 2, '2017-05-22 13:01:36'),
(2, 1, 3, '2017-05-22 13:37:28'),
(3, 1, 6, '2017-05-22 13:40:59'),
(4, 1, 4, '2017-05-22 13:41:10'),
(6, 1, 7, '2017-05-22 13:41:24'),
(7, 1, 5, '2017-05-22 13:41:38'),
(8, 4, 1, '2017-05-23 07:37:56'),
(9, 4, 2, '2017-05-23 07:38:06'),
(10, 4, 7, '2017-05-23 07:38:14');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `message` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Salvarea datelor din tabel `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `likes`, `message`, `data`) VALUES
(1, 1, 5, 'Stiti un program care citeste texte si in romana adica un robot care citeste textul pe care il introduci tu? Va rog raspundeti-mi!', '2017-05-23 08:01:48'),
(2, 5, 10, 'Salut , stie careva de unde as putea sa-mi iau o placa de skate mai buna cam pana in 200 RON ?', '2017-05-23 08:01:36'),
(3, 6, 4, 'A auzit careva de mirunette? Am vazut ca fac excursii misto in SUA dar nu stiu nimic despre ei? A avut careva de a face cu ei?', '2017-05-23 08:01:38'),
(4, 4, 3, 'La examenul auto(salÄƒ) dupÄƒ ce termini toate Ã®ntrebÄƒrile È™i eÈ™ti admis Ã®È›i apare programarea la traseu care are timp de 5min È™i dupÄƒ ce confirmarea datei se Ã®nchide ecranul È™i gata?', '2017-05-23 08:01:45');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `date`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin1234', 'Ivanyiczki', 'Gabor', '2017-05-22 13:01:06'),
(2, 'dani.tamaioaga', 'dani.tamaioaga@hotmail.com', 'danidani111', 'Dani', 'Tamaioaga', '2017-05-23 09:35:26'),
(3, 'ionut.henter', 'ionut.henter@yahoo.com', 'gaga2011', 'Henter', 'Ionut', '2017-05-23 09:34:49'),
(4, 'Andrei2011', 'andrei@yahoo.com', 'andrei1234', 'Andrei', 'Pop', '2017-05-22 13:38:48'),
(5, 'Gabi111', 'gabi.gabi@aaa.com', 'gaga2010', 'Gabi', 'Cojocar', '2017-05-22 13:39:32'),
(6, 'mihai.petran', 'petranu1990@yahoo.com', 'anaanana', 'Mihai', 'Petran', '2017-05-23 09:36:17'),
(7, 'cojocar.adi', 'aditzu@gmail.com', 'adiadi222', 'Aditzu', 'Adi', '2017-05-22 13:40:47'),
(8, 'balanean.ionut18', 'b.ionut@yahoo.com', 'bionut2011', 'Balanean', 'Ionut', '2017-05-23 07:24:35'),
(9, 'tunde.b18', 'tunde.tunde@gmail.com', 'tunde2011', 'Tunde', 'Pami', '2017-05-23 07:25:23');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_picture` text NOT NULL,
  `adress` varchar(50) NOT NULL,
  `alternative_email` varchar(50) NOT NULL,
  `mobile_nr` int(25) NOT NULL,
  `sex` set('Barbat','Femeie') NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Salvarea datelor din tabel `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `profile_picture`, `adress`, `alternative_email`, `mobile_nr`, `sex`, `age`) VALUES
(1, 1, 'http://projects.dev/SocialNetwork/public/img/image1.jpg', 'Baia Mare,str. Aleea Noua,nr. 5', 'second_mail@mail.com', 745678984, 'Barbat', 18),
(2, 6, 'http://projects.dev/SocialNetwork/public/img/image2.jpg', 'Baia Mare,str. Margeanului,nr. 8', 'user.userl@mail.com', 75678743, 'Barbat', 18),
(3, 4, 'http://projects.dev/SocialNetwork/public/img/image4.jpg', 'Cluj-Napoca,str. Fericirii,nr. 11', 'andrei.112@mail.com', 75464373, 'Barbat', 22),
(4, 7, 'http://projects.dev/SocialNetwork/public/img/image5.jpg', 'Bucuresti,str. Firizei,nr. 15', 'alexu.aaa@mail.com', 75464373, 'Barbat', 28),
(5, 2, 'http://projects.dev/SocialNetwork/public/img/image6.jpg', 'Baia Mare,str. Aleea Noua,nr. 5', 'second_mail@mail.com', 75464373, 'Barbat', 34),
(6, 5, 'http://projects.dev/SocialNetwork/public/img/image3.jpg', 'Baia Mare,str. Aleea Noua,nr. 5', 'second_mail@mail.com', 75464373, 'Barbat', 22),
(7, 3, 'http://projects.dev/SocialNetwork/public/img/image1.jpg', 'Baia Mare,str. Aleea Noua,nr. 5', 'second_mail@mail.com', 75464373, 'Barbat', 33),
(8, 9, 'http://projects.dev/SocialNetwork/public/img/image7.jpg', 'Livada,str. Viitorului,nr.10', 'tunde.secondgmail@aa.com', 968455, 'Femeie', 19),
(9, 8, 'http://projects.dev/SocialNetwork/public/img/image8.jpg', 'Bistrita,str. Florilor,nr. 11', 'b.ionutz@hotmail.com', 5547732, 'Barbat', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_users` (`user_id`),
  ADD KEY `FK_comments_posts` (`post_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_friends_users` (`user_id1`),
  ADD KEY `FK_friends_users_2` (`user_id2`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_posts_users` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `FK_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrictii pentru tabele `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `FK_friends_users` FOREIGN KEY (`user_id1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_friends_users_2` FOREIGN KEY (`user_id2`) REFERENCES `users` (`id`);

--
-- Restrictii pentru tabele `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_posts_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Restrictii pentru tabele `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
