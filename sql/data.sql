CREATE DATABASE IF NOT EXISTs MovieSite;

USE MovieSite;

CREATE TABLE IF NOT EXISTs Movie (
    movieId INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    overview VARCHAR(2000),
    imageUrl VARCHAR(1000) NOT NULL,
    releaseDate DATE NOT NULL,
    backdropUrl VARCHAR(1000) NOT NULL
);

CREATE TABLE IF not EXISTs User (
    userId VARCHAR(256) PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    maskedPw VARCHAR(256) NOT NULL,
    email VARCHAR(255),
    age int
);

CREATE TABLE IF NOT EXISTs Review (
    reviewId INT PRIMARY KEY,
    userId VARCHAR(256) ,
    movieId INT,
    content VARCHAR(2000) NOT NULL,
    rating INT,
    reviewDate DATE NOT NULL,
    FOREIGN KEY (movieId) References Movie(movieId),
    FOREIGN KEY (userId) References User(userId)
);

-- Insert data
INSERT INTO `Movie` VALUES (47964,'A Good Day to Die Hard','Iconoclastic, take-no-prisoners cop John McClane, finds himself for the first time on foreign soil after traveling to Moscow to help his wayward son Jack - unaware that Jack is really a highly-trained CIA operative out to stop a nuclear weapons heist. With the Russian underworld in pursuit, and battling a countdown to war, the two McClanes discover that their opposing methods make them unstoppable heroes.','/qJ0csDXAVFMsNn0cRcjy6W6PxAK.jpg','2013-02-06','/mV1HOCbUqx7nfFPwledYsvMYHrw.jpg\r'),(76600,'Avatar: The Way of Water','Set more than a decade after the events of the first film, learn the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the lengths they go to keep each other safe, the battles they fight to stay alive, and the tragedies they endure.','/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg','2022-12-14','/8rpDcsfLJypbO6vREc0547VKqEv.jpg\r'),(204553,'Cold Eyes','Ha Yoon-ju becomes the newest member of a unit within the Korean Police Forces Special Crime Department that specializes in surveillance activities on high-profile criminals. She teams up with Hwang Sang-jun, the veteran leader of the unit, and tries to track down James who is the cold-hearted leader of an armed criminal organization.','/i1a1rk2qPrxIF5pYyBB2oSTa6OR.jpg','2013-07-03','/aH4ZCM94FeWO0GSBLPYxnjkIuUP.jpg\r'),(254128,'San Andreas','In the aftermath of a massive earthquake in California, a rescue-chopper pilot makes a dangerous journey across the state in order to rescue his estranged daughter.','/2Gfjn962aaFSD6eST6QU3oLDZTo.jpg','2015-05-27','/zcySy6dnSmyqiichtDgO7AEeZoq.jpg\r'),(298618,'The Flash','When his attempt to save his family inadvertently alters the future, Barry Allen becomes trapped in a reality in which General Zod has returned and there are no Super Heroes to turn to. In order to save the world that he is in and return to the future that he knows, Barry\'s only hope is to race for his life. But will making the ultimate sacrifice be enough to reset the universe?','/rktDFPbfHfUbArZ6OOOKsXcv0Bm.jpg','2023-06-13','/yF1eOkaYvwiORauRCPWznV9xVvi.jpg\r'),(335977,'Indiana Jones and the Dial of Destiny','Finding himself in a new era, approaching retirement, Indy wrestles with fitting into a world that seems to have outgrown him. But as the tentacles of an all-too-familiar evil return in the form of an old rival, Indy must don his hat and pick up his whip once more to make sure an ancient and powerful artifact doesn\'t fall into the wrong hands.','/Af4bXE63pVsb2FtbW8uYIyPBadD.jpg','2023-06-28','/35z8hWuzfFUZQaYog8E9LsXW3iI.jpg\r'),(385687,'Fast X','Over many missions and against impossible odds, Dom Toretto and his family have outsmarted, out-nerved and outdriven every foe in their path. Now, they confront the most lethal opponent they\'ve ever faced: A terrifying threat emerging from the shadows of the past who\'s fueled by blood revenge, and who is determined to shatter this family and destroy everythingΓÇöand everyoneΓÇöthat Dom loves, forever.','/fiVW06jE7z9YnO4trhaMEdclSiC.jpg','2023-05-17','/4XM8DUTQb3lhLemJC51Jx4a2EuA.jpg\r'),(396263,'Gantz:O','After being brutally murdered in a subway station, a teen boy awakens to find himself resurrected by a strange computer named Gantz, and forced to fight a large force of invading aliens in Osaka.','/9yTuw6ddf28lItHwgeqFSNtXsaG.jpg','2016-10-14','/ddAQBXqxog1sgjfDf8qeMTuEbMO.jpg\r'),(406563,'Insidious: The Last Key','Parapsychologist Elise Rainier and her team travel to Five Keys, NM, to investigate a manΓÇÖs claim of a haunting. Terror soon strikes when Rainier realizes that the house he lives in was her familyΓÇÖs old home.','/nb9fc9INMg8kQ8L7sE7XTNsZnUX.jpg','2018-01-03','/PwI3EfasE9fVuXsmMu9ffJh0Re.jpg\r'),(423108,'The Conjuring: The Devil Made Me Do It','Paranormal investigators Ed and Lorraine Warren encounter what would become one of the most sensational cases from their files. The fight for the soul of a young boy takes them beyond anything they\'d ever seen before, to mark the first time in U.S. history that a murder suspect would claim demonic possession as a defense.','/xbSuFiJbbBWCkyCCKIMfuDCA4yV.jpg','2021-05-25','/qi6Edc1OPcyENecGtz8TF0DUr9e.jpg\r'),(445651,'The Darkest Minds','After a disease kills 98% of America\'s children, the surviving 2% develop superpowers and are placed in internment camps. A 16-year-old girl escapes her camp and joins a group of other teens on the run from the government.','/94RaS52zmsqaiAe1TG20pdbJCZr.jpg','2018-07-25','/rPBeEi1tU8IhQ9rbdnlLU0d0NR.jpg\r'),(447277,'The Little Mermaid','The youngest of King TritonΓÇÖs daughters, and the most defiant, Ariel longs to find out more about the world beyond the sea, and while visiting the surface, falls for the dashing Prince Eric. With mermaids forbidden to interact with humans, Ariel makes a deal with the evil sea witch, Ursula, which gives her a chance to experience life on land, but ultimately places her life ΓÇô and her fatherΓÇÖs crown ΓÇô in jeopardy.','/ym1dxyOk4jFcSl4Q2zmRrA5BEEN.jpg','2023-05-18','/fCw8CVgII6W7ALbIh0SgXax3Hsj.jpg\r'),(447365,'Guardians of the Galaxy Vol. 3','Peter Quill, still reeling from the loss of Gamora, must rally his team around him to defend the universe along with protecting one of their own. A mission that, if not completed successfully, could quite possibly lead to the end of the Guardians as we know them.','/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg','2023-05-03','/5YZbUmjbMa3ClvSW1Wj3D6XGolb.jpg\r'),(455476,'Knights of the Zodiac','When a headstrong street orphan, Seiya, in search of his abducted sister unwittingly taps into hidden powers, he discovers he might be the only person alive who can protect a reincarnated goddess, sent to watch over humanity. Can he let his past go and embrace his destiny to become a Knight of the Zodiac?','/qW4crfED8mpNDadSmMdi7ZDzhXF.jpg','2023-04-27','/oqP1qEZccq5AD9TVTIaO6IGUj7o.jpg\r'),(502356,'The Super Mario Bros. Movie','While working underground to fix a water main, Brooklyn plumbersΓÇöand brothersΓÇöMario and Luigi are transported down a mysterious pipe and wander into a magical new world. But when the brothers are separated, Mario embarks on an epic quest to find Luigi.','/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg','2023-04-05','/9n2tJBplPbgR2ca05hS5CKXwP2c.jpg\r'),(536437,'Hypnotic','A detective becomes entangled in a mystery involving his missing daughter and a secret government program while investigating a string of reality-bending crimes.','/3IhGkkalwXguTlceGSl8XUJZOVI.jpg','2023-05-11','/8FhKnPpql374qyyHAkZDld93IUw.jpg\r'),(543504,'Detective vs. Sleuths','When Hong Kong is rocked by multiple gruesome murders, the police forms a task force to investigate. Jun, once a brilliant detective who suffered a mental breakdown, begins his own investigation. Eventually, the police learn that the murder victims are all suspects of cold cases being rubbed out by a figure known as \"The Sleuth\". Now, Jun and a detective from the task force are on a race against time to beat the brutal killer at its own game.','/sNAeYA5EZ7ouoHnVxQ0vMbfgiEi.jpg','2022-07-08','/70DKGgzTwyC7fr3FGM6JSHGqmPm.jpg\r'),(569094,'Spider-Man: Across the Spider-Verse','After reuniting with Gwen Stacy, BrooklynΓÇÖs full-time, friendly neighborhood Spider-Man is catapulted across the Multiverse, where he encounters the Spider Society, a team of Spider-People charged with protecting the MultiverseΓÇÖs very existence. But when the heroes clash on how to handle a new threat, Miles finds himself pitted against the other Spiders and must set out on his own to save those he loves most.','/8Vt6mWEReuy4Of61Lnj5Xj704m8.jpg','2023-05-31','/4HodYYKEIsGOdinkGi2Ucz6X9i0.jpg\r'),(603692,'John Wick: Chapter 4','With the price on his head ever increasing, John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.','/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg','2023-03-22','/7I6VUdPj6tQECNHdviJkUHD2u89.jpg\r'),(614479,'Insidious: The Red Door','To put their demons to rest once and for all, Josh Lambert and a college-aged Dalton Lambert must go deeper into The Further than ever before, facing their family\'s dark past and a host of new and more horrifying terrors that lurk behind the red door.','/azTC5osYiqei1ofw6Z3GmUrxQbi.jpg','2023-07-05','/jOkXeuLo4MBMpeoMa1ClAfTkxuI.jpg\r'),(640146,'Ant-Man and the Wasp: Quantumania','Super-Hero partners Scott Lang and Hope van Dyne, along with with Hope\'s parents Janet van Dyne and Hank Pym, and Scott\'s daughter Cassie Lang, find themselves exploring the Quantum Realm, interacting with strange new creatures and embarking on an adventure that will push them beyond the limits of what they thought possible.','/qnqGbB22YJ7dSs4o6M7exTpNxPz.jpg','2023-02-15','/m8JTwHFwX7I7JY5fPe4SjqejWag.jpg\r'),(664767,'Mortal Kombat Legends: Scorpion\'s Revenge','After the vicious slaughter of his family by stone-cold mercenary Sub-Zero, Hanzo Hasashi is exiled to the torturous Netherrealm. There, in exchange for his servitude to the sinister Quan Chi, heΓÇÖs given a chance to avenge his family ΓÇô and is resurrected as Scorpion, a lost soul bent on revenge. Back on Earthrealm, Lord Raiden gathers a team of elite warriors ΓÇô Shaolin monk Liu Kang, Special Forces officer Sonya Blade and action star Johnny Cage ΓÇô an unlikely band of heroes with one chance to save humanity. To do this, they must defeat Shang TsungΓÇÖs horde of Outworld gladiators and reign over the Mortal Kombat tournament.','/4VlXER3FImHeFuUjBShFamhIp9M.jpg','2020-04-12','/vw3zNfzvnVNF7nIjpiEgcdznfeC.jpg\r'),(667538,'Transformers: Rise of the Beasts','When a new threat capable of destroying the entire planet emerges, Optimus Prime and the Autobots must team up with a powerful faction known as the Maximals. With the fate of humanity hanging in the balance, humans Noah and Elena will do whatever it takes to help the Transformers as they engage in the ultimate battle to save Earth.','/gPbM0MK8CP8A174rmUwGsADNYKD.jpg','2023-06-06','/woJbg7ZqidhpvqFGGMRhWQNoxwa.jpg\r'),(697843,'Extraction 2','Tasked with extracting a family who is at the mercy of a Georgian gangster, Tyler Rake infiltrates one of the world\'s deadliest prisons in order to save them. But when the extraction gets hot, and the gangster dies in the heat of battle, his equally ruthless brother tracks down Rake and his team to Vienna, in order to get revenge.','/7gKI9hpEMcZUQpNgKrkDzJpbnNS.jpg','2023-06-09','/wRxLAw4l17LqiFcPLkobriPTZAw.jpg\r'),(713704,'Evil Dead Rise','A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, thrusting them into a primal battle for survival as they face the most nightmarish version of family imaginable.','/5ik4ATKmNtmJU6AYD0bLm56BCVM.jpg','2023-04-12','/7bWxAsNPv9CXHOhZbJVlj2KxgfP.jpg\r'),(758323,'The Pope\'s Exorcist','Father Gabriele Amorth, Chief Exorcist of the Vatican, investigates a young boy\'s terrifying possession and ends up uncovering a centuries-old conspiracy the Vatican has desperately tried to keep hidden.','/gNPqcv1tAifbN7PRNgqpzY8sEJZ.jpg','2023-04-05','/hiHGRbyTcbZoLsYYkO4QiCLYe34.jpg\r'),(840326,'Sisu','Deep in the wilderness of Lapland, Aatami Korpi is searching for gold but after he stumbles upon Nazi patrol, a breathtaking and gold-hungry chase through the destroyed and mined Lapland wilderness begins.','/ygO9lowFMXWymATCrhoQXd6gCEh.jpg','2023-01-27','/o9bbojtrrpl0yriiTmzC3Lp3OhA.jpg\r'),(841755,'Mortal Kombat Legends: Battle of the Realms','The Earthrealm heroes must journey to the Outworld and fight for the survival of their homeland, invaded by the forces of evil warlord Shao Kahn, in the tournament to end all tournaments: the final Mortal Kombat.','/ablrE8IbWcIrAxMmm4gnPn75AMS.jpg','2021-08-31','/dssCw0mUmD4EriUmkwB3PnsGu4q.jpg\r'),(848730,'Los bastardos','','/ffDHUOjHNfqSizXFA7oymCCckE8.jpg','2023-03-30','/gno3ABJacqieb0GloIwNCihuwYO.jpg\r'),(882569,'Guy Ritchie\'s The Covenant','During the war in Afghanistan, a local interpreter risks his own life to carry an injured sergeant across miles of grueling terrain.','/kVG8zFFYrpyYLoHChuEeOGAd6Ru.jpg','2023-04-19','/eTvN54pd83TrSEOz6wbsXEJktCV.jpg\r'),(890771,'The Black Demon','Oilman Paul Sturges\' idyllic family vacation turns into a nightmare when they encounter a ferocious megalodon shark that will stop at nothing to protect its territory. Stranded and under constant attack, Paul and his family must somehow find a way to get his family back to shore alive before it strikes again in this epic battle between humans and nature.','/uiFcFIjig0YwyNmhoxkxtAAVIL2.jpg','2023-04-26','/9t0tJXcOdWwwxmGTk112HGDaT0Q.jpg\r'),(917007,'Bed Rest','A pregnant woman on bed rest begins to wonder if her house is haunted or if it\'s all in her head.','/tiZF8b9T9fMcwvsEEkJ5ik1wCnV.jpg','2022-12-08','/lQzSMhkAl90iXPirjnLbRHkxApC.jpg\r'),(976573,'Elemental','In a city where fire, water, land and air residents live together, a fiery young woman and a go-with-the-flow guy will discover something elemental: how much they have in common.','/8riWcADI1ekEiBguVB9vkilhiQm.jpg','2023-06-14','/cSYLX73WskxCgvpN3MtRkYUSj1T.jpg\r'),(986070,'The Wrath of Becky','Two years after she escaped a violent attack on her family, 16-year-old Becky attempts to rebuild her life in the care of an older woman -- a kindred spirit named Elena. However, when a violent group known as the Noble Men break into their home, attack them and take their beloved dog, Becky must return to her old ways to protect herself and her loved ones.','/3LShl6EwqptKIVq6NWOZ0FbZHEe.jpg','2023-05-26','/osnvZffaZymubHiBkOsIFd8Y3Re.jpg\r'),(988078,'Through My Window: Across the Sea','After a year of long-distance, Raquel and Ares reunite on a steamy beach trip. Faced with fresh flirtations and insecurities, will their love prevail?','/dAyJqJ8KoglZysttC6BfVmDFQUt.jpg','2023-06-23','/2X5nnvkWvYRFmTspXY7lsJqDzog.jpg\r'),(993867,'Eradication','When an unknown disease wipes out most of the worldΓÇÖs population, a man with unique blood is isolated for study. Fearing for his wifeΓÇÖs safety, he breaks his quarantine ΓÇô into a world overrun by monstrous Infected and a shadowy agency hunting them down.','/6XZYA9VtCcidCU8Hus0J0V9wFhY.jpg','2022-07-15','/ulaj7IhW72EK0cGSnMpP0UixTTC.jpg\r'),(1010581,'My Fault','Noah must leave her city, boyfriend, and friends to move into William Leister\'s mansion, the flashy and wealthy husband of her mother Rafaela. As a proud and independent 17 year old, Noah resists living in a mansion surrounded by luxury. However, it is there where she meets Nick, her new stepbrother, and the clash of their strong personalities becomes evident from the very beginning.','/w46Vw536HwNnEzOa7J24YH9DPRS.jpg','2023-06-08','/lntyt4OVDbcxA1l7LtwITbrD3FI.jpg\r'),(1036561,'Shadow Master','After being slain by a group of criminals, a man is reborn with animal-like superpowers and makes it his mission to right the wrongs of his city.','/67ZsRKbItt6B1yHlsJKgfPWOyuJ.jpg','2022-11-03','/xDEVdWduhRdNS4PzA6wif6FjUQb.jpg\r'),(1103825,'War of the Worlds: The Attack','Three young astronomers fight to survive a deadly Martian invasion.','/iDsQHY4mNe8AD5WJT5sZBl5hdMK.jpg','2023-04-21','/8DW82CIg3LRYN8Mrvj9JJ7GXKM3.jpg\r'),(1129956,'iNumber Number: Jozi Gold','When an undercover cop is tasked with investigating a historic gold heist in Johannesburg, heΓÇÖs forced to choose between his conscience and the law.','/7uJkLigRamfHerFSkfFOCMqH0pi.jpg','2023-06-23','/u6bGwwMgQhcqQJKHASwN4PEcYyj.jpg\r');

INSERT INTO `User` VALUES ('29c8ee610885aee2a19051289f978749c6ea5fc7bf31f9396b9f66ec60c9042d','l09223','b75276cb1bddc269b6282887bd6daedbd77ca748eeb5afbe7705ee3055c5b457','l09223@example.com',20),('3ec3391d7008ac5bdbe751fb20bf38d5af0a580e5cc5387be19d0ec51633471c','tinalau','b75276cb1bddc269b6282887bd6daedbd77ca748eeb5afbe7705ee3055c5b457','tinalau@example.com',21),('6410ef0d3a6d3324fcba02131e5742215c99301055398a75457a27ac89dffb5f','Amy','b39dc8e563b2d7ea4606d5c466240257133fdc79cc0615f64c943b024079f598','Amy@example.com',20),('7b717950ea1e02ee962fa49549667f329547b833ebce209cd53da66b6b9b264c','Jerry','133aeb6560ce139e47cdfc5428346e72daa9ddbe375f4a2c30217976cdd73201','Jerry@example.com',20),('81f3bf42a93cf18dece9321ac5c93313126eb5ca92164d74643e4cbf60ecde9c','Tom','7d1c3a3efb5f00dc5b962a217b8fe3125034618cd04b457a3323c23d86164fde','Tom@example.com',20),('8d2f3db7b78917dfa579396265d931aece30d695413e5787c387f1c0d6cfafac','Rick','284a270bb53406861d6269ed5b37c14db07d617c247dc6d8edb3377cc1270454','Rick@example.com',20),('930d87c72a31bb60272e6e9cc9739a4ea0b0135c45a263e28003f8d566b25abd','icyfung','b75276cb1bddc269b6282887bd6daedbd77ca748eeb5afbe7705ee3055c5b457','icyfung@example.com',20),('99a563ab2f6e21e96998f9fddd2a2bab82b70ac019579502b8d7fc0032ff62bb','Ada','37035e834166c067e96f914c6c93ea2c67ab92395d4b052cfe84be326e7af4be','Ada@example.com',20),('aebac53c46bbeff10fdd26ca0e2196a9bfc1d19bf88eb1efd65a36151c581051','Mary','7898a7deaf3bfc8f46261e7f97a5e3824843dbc5b2ab6d1f80cbf0d49257551d','Mary@example.com',20),('f42c1b454036cb645e0959dac0e5b20fa40b4e0b6fe386e296f76c0d1392382f','samhill1234','01bf836ecae3595cf0f8a0b791479e717933e8e5eb4c99e9366a1ecb114c59f9','samhill1234@example.com',20);

INSERT INTO `Review` VALUES (1,'81f3bf42a93cf18dece9321ac5c93313126eb5ca92164d74643e4cbf60ecde9c',614479,'Amazing movie!',9,'2023-07-06'),(2,'7b717950ea1e02ee962fa49549667f329547b833ebce209cd53da66b6b9b264c',335977,'Loved every minute of it!',8,'2023-07-06'),(3,'6410ef0d3a6d3324fcba02131e5742215c99301055398a75457a27ac89dffb5f',1129956,'A must-see film!',8,'2023-07-06'),(4,'aebac53c46bbeff10fdd26ca0e2196a9bfc1d19bf88eb1efd65a36151c581051',988078,'Incredible storyline.',5,'2023-07-06'),(5,'8d2f3db7b78917dfa579396265d931aece30d695413e5787c387f1c0d6cfafac',976573,'Great acting performances.',1,'2023-07-06'),(6,'99a563ab2f6e21e96998f9fddd2a2bab82b70ac019579502b8d7fc0032ff62bb',298618,'Highly recommended!',6,'2023-07-06'),(7,'81f3bf42a93cf18dece9321ac5c93313126eb5ca92164d74643e4cbf60ecde9c',697843,'Couldn\'t stop watching!',6,'2023-07-06'),(8,'7b717950ea1e02ee962fa49549667f329547b833ebce209cd53da66b6b9b264c',1010581,'Brilliantly directed.',6,'2023-07-06'),(9,'6410ef0d3a6d3324fcba02131e5742215c99301055398a75457a27ac89dffb5f',667538,'Emotional and powerful.',7,'2023-07-06'),(10,'aebac53c46bbeff10fdd26ca0e2196a9bfc1d19bf88eb1efd65a36151c581051',614479,'A cinematic masterpiece.',2,'2023-07-06'),(11,'8d2f3db7b78917dfa579396265d931aece30d695413e5787c387f1c0d6cfafac',335977,'Thrilling from start to finish.',10,'2023-07-06'),(12,'99a563ab2f6e21e96998f9fddd2a2bab82b70ac019579502b8d7fc0032ff62bb',1129956,'Impressive special effects.',3,'2023-07-06'),(13,'81f3bf42a93cf18dece9321ac5c93313126eb5ca92164d74643e4cbf60ecde9c',988078,'Captivating plot twists.',8,'2023-07-06'),(14,'7b717950ea1e02ee962fa49549667f329547b833ebce209cd53da66b6b9b264c',976573,'Beautiful cinematography.',1,'2023-07-06'),(15,'6410ef0d3a6d3324fcba02131e5742215c99301055398a75457a27ac89dffb5f',298618,'Fantastic soundtrack.',8,'2023-07-06'),(16,'aebac53c46bbeff10fdd26ca0e2196a9bfc1d19bf88eb1efd65a36151c581051',697843,'Kept me on the edge of my seat.',3,'2023-07-06'),(17,'8d2f3db7b78917dfa579396265d931aece30d695413e5787c387f1c0d6cfafac',1010581,'Well-developed characters.',8,'2023-07-06'),(18,'99a563ab2f6e21e96998f9fddd2a2bab82b70ac019579502b8d7fc0032ff62bb',667538,'Thought-provoking and deep.',4,'2023-07-06'),(19,'81f3bf42a93cf18dece9321ac5c93313126eb5ca92164d74643e4cbf60ecde9c',1129956,'Engaging and entertaining.',4,'2023-07-06'),(20,'7b717950ea1e02ee962fa49549667f329547b833ebce209cd53da66b6b9b264c',988078,'An instant classic!',4,'2023-07-06'),(21,'f42c1b454036cb645e0959dac0e5b20fa40b4e0b6fe386e296f76c0d1392382f',976573,'Hello',4,'2023-07-14'),(22,'930d87c72a31bb60272e6e9cc9739a4ea0b0135c45a263e28003f8d566b25abd',614479,'Great movie!',9,'2023-07-14');
