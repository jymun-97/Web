-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-06-25 08:05
-- 서버 버전: 10.4.11-MariaDB
-- PHP 버전: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `project`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `activity`
--

CREATE TABLE `activity` (
  `num` int(11) NOT NULL,
  `title` char(30) NOT NULL,
  `content` char(255) NOT NULL,
  `img_name` char(100) NOT NULL,
  `img_type` char(30) NOT NULL,
  `img_copied` char(30) NOT NULL,
  `file_name` char(30) NOT NULL,
  `file_type` char(30) NOT NULL,
  `file_copied` char(30) NOT NULL,
  `fix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `activity`
--

INSERT INTO `activity` (`num`, `title`, `content`, `img_name`, `img_type`, `img_copied`, `file_name`, `file_type`, `file_copied`, `fix`) VALUES
(3, '2019년 9월호', '해당 이미지를 눌러 온라인으로 PRESS 9월호를 만나보세요!', 'september.jpg', 'image/jpeg', '2020_06_24_22_25_51.jpg', '코리아텍 19년 9월호.pdf', 'application/pdf', '2020_06_24_22_25_51.pdf', 0),
(4, '2019년 10월호', '해당 이미지를 눌러 온라인으로 PRESS 10월호를 만나보세요!', 'october.jpg', 'image/jpeg', '2020_06_24_22_31_02.jpg', '코리아텍 19년 10월호.pdf', 'application/pdf', '2020_06_24_22_31_02.pdf', 1),
(6, '2019년 11월호', '해당 이미지를 눌러 온라인으로 PRESS 11월호를 만나보세요!', 'novembers.jpg', 'image/jpeg', '2020_06_24_22_33_07.jpg', '코리아텍 19년 11월호.pdf', 'application/pdf', '2020_06_24_22_33_07.pdf', 1),
(7, '2019년 12월호', '해당 이미지를 눌러 온라인으로 PRESS 12월호를 만나보세요!', 'december.jpg', 'image/jpeg', '2020_06_24_22_34_14.jpg', '코리아텍 19년 12월호.pdf', 'application/pdf', '2020_06_24_22_34_14.pdf', 1),
(8, '2019년 6월호', '해당 이미지를 눌러 온라인으로 PRESS 6월호를 만나보세요!', 'june.jpg', 'image/jpeg', '2020_06_24_22_37_05.jpg', '코리아텍 19년 6월호.pdf', 'application/pdf', '2020_06_24_22_37_05.pdf', 1),
(9, '2019년 5월호', '해당 이미지를 눌러 온라인으로 PRESS 5월호를 만나보세요!', 'may.jpg', 'image/jpeg', '2020_06_24_22_38_01.jpg', '코리아텍 19년 5월호.pdf', 'application/pdf', '2020_06_24_22_38_01.pdf', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `num` int(11) NOT NULL,
  `email` char(30) NOT NULL,
  `name` char(20) NOT NULL,
  `subject` char(100) NOT NULL,
  `content` char(255) DEFAULT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) DEFAULT NULL,
  `ncomment` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `file_name` char(30) DEFAULT NULL,
  `file_type` char(10) DEFAULT NULL,
  `file_copied` char(30) DEFAULT NULL,
  `comment` char(100) DEFAULT NULL,
  `fix` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`num`, `email`, `name`, `subject`, `content`, `regist_day`, `hit`, `ncomment`, `likes`, `file_name`, `file_type`, `file_copied`, `comment`, `fix`) VALUES
(1, 'mjy0750@koreatech.ac.kr', '문준영', '[FAQ] 제보는 어떻게 하나요?', 'PRESS는 학우들로 부터 제보를 받아 기사를 작성합니다.\r\nPRESS가 알아봐줬으면 하는 것이 있다면 편집장에게 메일로 보내주세요.\r\n\r\nE-mail : OOO1234@koreatech.ac.kr', '2020-06-17 (00:32)', 178, 2, 17, '', '', '', NULL, 1),
(16, 'mjy0750@koreatech.ac.kr', '문준영', '[FAQ] 수습기자, 정기자란 무엇인가요?', ' PRESS는 총 4가지 직위가 있습니다.\r\n\r\n1. 편집장 : PRESS의 대표로서 신문 1면을 책임지며 신문 제작을 총괄합니다.\r\n2. 기획부장 : 신문 2면(기획면)을 책임지며 편집장의 부재시 대리임무를 수행합니다.\r\n3. 정기자 : 정기자는 각각 지면장의 임무를 수행하며 수습기자를 교육합니다. \r\n4. 수습기자 : 임무를 배우는 단계로, 1년의 활동 후 정기자로 진급할 자격을 얻습니다.', '2020-06-21 (05:45)', 108, 2, 10, '', '', '', NULL, 1),
(25, 'mjy0750@koreatech.ac.kr', '송윤재', '[FAQ] 구독하기란 무엇인가요?', 'PRESS는 구독자에게 매월 발간한 신문을 pdf파일로 제공합니다.\r\n구독방법은 홈페이지 아래 email을 입력하고 &#039;구독하기&#039;버튼을 클릭하면 활성화됩니다.', '2020-06-25 (06:09)', 6, 0, 3, '', '', '', NULL, 1),
(26, 'mjy0750@koreatech.ac.kr', '송윤재', '[FAQ] 이전에 발간한 신문을 볼 수 없나요?', 'PRESS 홈페이지 상단의 &#039;활동&#039;탭을 통해\r\n최근 4개월 간의 신문을 pdf파일을 통해 확인하실 수 있습니다.', '2020-06-25 (06:10)', 4, 0, 0, '', '', '', NULL, 1),
(27, 'dkanro@koreatech.ac.kr', '아무개', '신문을 발간하는 주기가 궁급합니다.', '매월 마다 신문을 발행한다면\r\n계절학기 기간에도 제작하나요?', '2020-06-25 (06:22)', 34, 2, 1, '', '', '', NULL, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `num` int(11) NOT NULL,
  `email` char(30) NOT NULL,
  `username` char(20) NOT NULL,
  `name` char(20) NOT NULL,
  `subject` char(100) NOT NULL,
  `content` char(255) NOT NULL,
  `regist_day` char(20) NOT NULL,
  `ncomment` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `file_name` char(30) DEFAULT NULL,
  `file_type` char(10) DEFAULT NULL,
  `file_copied` char(30) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`num`, `email`, `username`, `name`, `subject`, `content`, `regist_day`, `ncomment`, `likes`, `file_name`, `file_type`, `file_copied`, `number`) VALUES
(20, 'mjy0750@koreatech.ac.kr', '문준영', '문준영', '댓글 테스트', '테스트', '2020-06-21 (07:49)', 0, 8, '', 'upfile_typ', 'copied_file_name', 22),
(21, 'mjy0750@koreatech.ac.kr', '문준영', '문준영', '댓글 테스트', '테스트2', '2020-06-21 (07:49)', 0, 1, '', 'upfile_typ', 'copied_file_name', 22),
(23, 'mjy0750@koreatech.ac.kr', '문준영', '홍길동', 'PRESS에 가입하려면 어떻게 해야하나요?', 'PRESS는 매 학기 초에 신입수습기자를 모집합니다. 해당 시기에 간단한 신청서를 제출하시면 됩니다.', '2020-06-22 (00:44)', 0, 1, '', 'upfile_typ', 'copied_file_name', 17),
(24, 'mjy0750@koreatech.ac.kr', '문준영', '문준영', '댓글 테스트', 'zz', '2020-06-22 (01:33)', 0, 0, '', 'upfile_typ', 'copied_file_name', 22),
(25, 'mjy0750@koreatech.ac.kr', '문준영', '문준영', '댓글 테스트', 'asd', '2020-06-22 (01:54)', 0, 7, '', 'upfile_typ', 'copied_file_name', 22),
(41, 'mjy0750@koreatech.ac.kr', '문준영', '홍길동', 'test', 'asdddd', '2020-06-22 (02:52)', 0, 1, '', 'upfile_typ', 'copied_file_name', 4),
(46, 'dkanro@koreatech.ac.kr', '아무개', '아무개', '신문을 발간하는 주기가 궁급합니다.', '댓글 남겨주시면 감사드리겠습니다!', '2020-06-25 (06:22)', 0, 8, '', 'upfile_typ', 'copied_file_name', 27),
(47, 'mjy0750@koreatech.ac.kr', '문준영', '아무개', '신문을 발간하는 주기가 궁급합니다.', 'PRESS는 매월 신문을 발행하며, 계절학기 기간에는 발행하지 않습니다.', '2020-06-25 (06:26)', 0, 8, '', 'upfile_typ', 'copied_file_name', 27),
(51, 'test@koreatech.ac.kr', '홍길동', '문준영', '[FAQ] 제보는 어떻게 하나요?', 'test댓글', '2020-06-25 (13:40)', 0, 0, '', 'upfile_typ', 'copied_file_name', 1),
(52, 'mjy0750@koreatech.ac.kr', '문준영', '문준영', '[FAQ] 제보는 어떻게 하나요?', 'test', '2020-06-25 (13:41)', 0, 0, '', 'upfile_typ', 'copied_file_name', 1),
(53, 'test@koreatech.ac.kr', '홍길동', '문준영', '[FAQ] 수습기자, 정기자란 무엇인가요?', 'test', '2020-06-25 (13:50)', 0, 1, '', 'upfile_typ', 'copied_file_name', 16),
(54, 'mjy0750@koreatech.ac.kr', '문준영', '문준영', '[FAQ] 수습기자, 정기자란 무엇인가요?', '테스트', '2020-06-25 (13:51)', 0, 0, '', 'upfile_typ', 'copied_file_name', 16),
(55, 'test@koreatech.ac.kr', '홍길동', '홍길동', 'test', 'test', '2020-06-25 (14:18)', 0, 0, '', 'upfile_typ', 'copied_file_name', 28),
(56, 'mjy0750@koreatech.ac.kr', '문준영', '홍길동', 'test', '테스트', '2020-06-25 (14:18)', 0, 1, '', 'upfile_typ', 'copied_file_name', 28),
(57, 'test@koreatech.ac.kr', '홍길동', '홍길동', 'test', 'test', '2020-06-25 (14:44)', 0, 0, '', 'upfile_typ', 'copied_file_name', 29),
(58, 'mjy0750@koreatech.ac.kr', '문준영', '홍길동', 'test', 'test2', '2020-06-25 (14:45)', 0, 1, '', 'upfile_typ', 'copied_file_name', 29);

-- --------------------------------------------------------

--
-- 테이블 구조 `events`
--

CREATE TABLE `events` (
  `num` int(11) NOT NULL,
  `strdate` char(30) DEFAULT NULL,
  `title` char(255) NOT NULL,
  `imgtitle` char(255) NOT NULL,
  `imgcontent` char(255) NOT NULL,
  `content` char(255) NOT NULL,
  `fix` int(11) NOT NULL,
  `file_name` char(30) DEFAULT NULL,
  `file_type` char(10) DEFAULT NULL,
  `file_copied` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `events`
--

INSERT INTO `events` (`num`, `strdate`, `title`, `imgtitle`, `imgcontent`, `content`, `fix`, `file_name`, `file_type`, `file_copied`) VALUES
(7, '2020-09-02', '20년도 9월호 발간', '2020년 첫 발간!', '2학기 9월 2일, PRESS의 2020년 첫 신문이 발행될 예정입니다.\r\n\r\n많은 관심 부탁드립니다.', '9월 2일, PRESS의 20년 첫 신문이 발행됩니다!\r\n\r\n코로나19로 인해 본 1학기가 전면 비대면 강의로 실시됨에 따라\r\n\r\nPRESS 역시 한 학기동안 휴재를 하였습니다.\r\n\r\n보다 신뢰가는 PRESS로 찾아뵙겠습니다. 감사합니다.', 0, 'img_event_news.jpg', 'image/jpeg', '2020_06_24_20_25_58.jpg'),
(8, '2020-07-01', '낱말퀴즈 EVENT', '돌아온 낱말퀴즈!', '다가오는 7월 1일에 낱말퀴즈 이벤트가 진행됩니다.\r\n\r\n많은 관심 부탁드립니다.', '7월 1일, 낱말퀴즈 이벤드가 진행됩니다!\r\n\r\n한 학기동안 PRESS의 휴재가 아쉬웠던 당신을 위해\r\n\r\nPRESS가 소정의 선물을 준비했습니다.\r\n\r\n자세한 참여방법은 PRESS 페이스북 페이지를 참고해주세요', 1, 'img_event_quiz.jpg', 'image/jpeg', '2020_06_24_20_26_59.jpg'),
(10, '2020-08-31', '신입수습기자 모집', 'PRESS 새가족 모집!', 'PRESS의 신입수습기자를 모집합니다! 자세한 사항은 아래 버튼을 눌러주세요.', '2학기 개강 전까지 신입수습기자 지원을 받습니다!\r\n\r\nPRESS의 일원이 되고자 하는 학우께서는 편집장에게 이메일을 보내주세요.\r\n\r\n기타 문의사항은 게시판을 통해 질문해주세요!\r\n\r\ne-mail: OOOOO@koreatech.ac.kr\r\n\r\n메인으로', 1, 'img_event_highfive.jpg', 'image/jpeg', '2020_06_24_20_52_33.jpg'),
(11, '2020-09-30', '20년도 10월호 발간', '2020년 10월호 발간!', 'PRESS의 20년 10월호 신문이 발행됩니다! 많은 관심 부탁드립니다.', '9월 30일, PRESS의 20년 10월호 신문이 발행됩니다! 많은 관심 부탁드립니다. 감사합니다.', 1, 'img_event_reading.jpg', 'image/jpeg', '2020_06_24_20_55_57.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `file`
--

CREATE TABLE `file` (
  `num` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `num` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `studentID` char(20) NOT NULL,
  `email` char(30) NOT NULL,
  `pass` char(20) NOT NULL,
  `major` char(30) NOT NULL,
  `position` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`num`, `name`, `studentID`, `email`, `pass`, `major`, `position`) VALUES
(3, '송윤재', '2016136000', 'song4525@koreatech.ac.kr', 'asd', '컴퓨터공학부', '편집장'),
(5, '김고은', '20170000000', 'goeun4090@koreatech.ac.kr', 'asd', '기계공학부', '기획부장'),
(6, '이상훈', '20150000000', 'sanghun159@koreatech.ac.kr', 'asd', '메카트로닉스공학부', '정기자'),
(7, '문석희', '2016136039', 'zazachucky@koreatech.ac.kr', 'asd', '컴퓨터공학부', '정기자'),
(8, '이민주', '20190000000', 'mjlee6423@koreatech.ac.kr', 'asd', '디자인공학부', '수습기자'),
(9, '박성민', '20130000000', 'smpark213@naver.com', 'asd', '에너지신소재공학부', '명예기자'),
(10, '정현진', '20150000000', 'jeonghj2930@koreatech.ac.kr', 'asd', '산업경영학부', '명예기자'),
(12, '아무개', '2020136001', 'dkanro@koreatech.ac.kr', 'asd', '메카트로닉스공학부', '재학생'),
(13, '문준영', '2016136040', 'mjy0750@koreatech.ac.kr', 'asd', '컴퓨터공학부', '정기자'),
(14, '장윤영', '20160000000', 'yyJang@koreatech.ac.kr', 'asd', '메카트로닉스공학부', '정기자'),
(15, '김선웅', '20150000000', 'seonwoong17@koreatech.ac.kr', 'asd', '메카트로닉스공학부', '수습기자'),
(16, '박대성', '20160000000', 'parkDS8045@koreatech.ac.kr', 'asd', '산업경영학부', '정기자'),
(17, '김철수', '20200000000', 'kcs7894@gmail.com', 'asd', '전기전자통신공학부', '재학생');

-- --------------------------------------------------------

--
-- 테이블 구조 `subscribe`
--

CREATE TABLE `subscribe` (
  `num` int(11) NOT NULL,
  `email` char(30) NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `checked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `subscribe`
--

INSERT INTO `subscribe` (`num`, `email`, `regist_day`, `checked`) VALUES
(3, 'mjy0750@koreatech.ac.kr', '2020-06-24 (19:37)', 1),
(4, 'm_selene@naver.com', '2020-06-24 (23:38)', 1),
(5, 'mjy0750@gmail.com', '2020-06-25 (05:40)', 1),
(6, 'TEST123@naver.com', '2020-06-25 (08:17)', 1),
(7, 'test@koreatech.ac.kr', '2020-06-25 (13:37)', 1),
(8, 'test@gmail.com', '2020-06-25 (13:48)', 1),
(9, 'TEST@koreatech.ac.kr', '2020-06-25 (14:15)', 1),
(10, 'test123@naver.com', '2020-06-25 (14:41)', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- 테이블의 AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 테이블의 AUTO_INCREMENT `file`
--
ALTER TABLE `file`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 테이블의 AUTO_INCREMENT `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
