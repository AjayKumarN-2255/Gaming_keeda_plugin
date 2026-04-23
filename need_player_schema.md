

### 1. `igk_players` (Main Player Table)

CREATE TABLE igk_players (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_name VARCHAR(255) NOT NULL UNIQUE,
    country VARCHAR(100),
    player_type ENUM('Batsman', 'Bowler', 'All Rounder') DEFAULT 'All Rounder',
    profile_image_url VARCHAR(500)
);

### 2. `igk_player_profiles` (Extended Player Information)

CREATE TABLE igk_player_profiles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL UNIQUE,
    date_of_birth DATE,
    age INT,
    height_cm INT,
    batting_style VARCHAR(50),
    bowling_style VARCHAR(50),
    jersey_number INT,
    role VARCHAR(100),
    debut_date DATE,
    retirement_date DATE,
    father_name VARCHAR(255),
    mother_name VARCHAR(255),
    teams JSON,
    social_media JSON,
    images JSON
    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE
);


### 3. `igk_battng_stats` (Batting Statistics)

CREATE TABLE igk_batting_stats (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,

    format VARCHAR(50) NOT NULL,  -- Test, ODI, T20, IPL etc.

    matches INT DEFAULT 0,        -- Mat
    innings INT DEFAULT 0,        -- Inns
    not_outs INT DEFAULT 0,       -- NO

    runs INT DEFAULT 0,           -- Runs
    highest_score INT DEFAULT 0,  -- HS

    average DECIMAL(5,2) DEFAULT 0,      -- Ave
    balls_faced INT DEFAULT 0,           -- BF
    strike_rate DECIMAL(5,2) DEFAULT 0,  -- SR

    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE,

    UNIQUE(player_id, format)
);

### 4. `igk_bowling_stats` (Bowling Statistics)

CREATE TABLE igk_bowling_stats (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,

    format VARCHAR(50) NOT NULL,  -- Test, ODI, T20, IPL

    matches INT DEFAULT 0,        -- Mat
    innings INT DEFAULT 0,        -- Inns

    balls INT DEFAULT 0,
    runs INT DEFAULT 0,
    wickets INT DEFAULT 0,

    best_bowling_innings VARCHAR(20), -- BBI (e.g. 5/24)
    best_bowling_match VARCHAR(20),   -- BBM (e.g. 8/60)

    average DECIMAL(5,2) DEFAULT 0,       -- Ave
    economy_rate DECIMAL(5,2) DEFAULT 0,  -- Econ
    strike_rate DECIMAL(5,2) DEFAULT 0,   -- SR

    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE,

    UNIQUE(player_id, format)
);


### 5. `igk_bowling_stats` (Bowling Statistics)

CREATE TABLE igk_player_contracts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,

    year YEAR NOT NULL,
    team VARCHAR(255) NOT NULL,
    salary DECIMAL(10,2) DEFAULT 0,

    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE,

    UNIQUE(player_id, year)
);