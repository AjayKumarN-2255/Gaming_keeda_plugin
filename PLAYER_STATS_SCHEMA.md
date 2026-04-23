# Player Stats Schema

This schema defines the structure for storing cricket player statistics.

## Database Tables

### 1. `igk_players` (Main Player Table)

```sql
CREATE TABLE igk_players (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_name VARCHAR(255) NOT NULL UNIQUE,
    country VARCHAR(100),
    player_type ENUM('Batsman', 'Bowler', 'All Rounder') DEFAULT 'All Rounder',
    profile_image_url VARCHAR(500),
);
```

### 2. `igk_player_profiles` (Extended Player Information)

```sql
CREATE TABLE igk_player_profiles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL UNIQUE,
    date_of_birth DATE,
    age INT,
    height_cm INT,
    batting_style VARCHAR(50),
    bowling_style VARCHAR(50),
    jersey_number INT,
    batting_position INT,
    bio TEXT,
    role VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE
);
```

### 3. `igk_player_teams` (Team History)

```sql
CREATE TABLE igk_player_teams (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,
    team_name VARCHAR(255) NOT NULL,
    tournament VARCHAR(255),
    start_year INT,
    end_year INT,
    is_current BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE,
    KEY idx_player_team (player_id, team_name)
);
```

### 4. `igk_social_media` (Social Media Handles)

```sql
CREATE TABLE igk_social_media (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL UNIQUE,
    instagram_handle VARCHAR(255),
    instagram_url VARCHAR(500),
    twitter_handle VARCHAR(255),
    twitter_url VARCHAR(500),
    facebook_url VARCHAR(500),
    linkedin_url VARCHAR(500),
    whatsapp_link VARCHAR(500),
    telegram_link VARCHAR(500),
    youtube_channel VARCHAR(500),
    website_url VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE
);
```

### 5. `igk_player_media` (Photos & Videos)

```sql
CREATE TABLE igk_player_media (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,
    media_type ENUM('photo', 'video', 'gallery') DEFAULT 'photo',
    media_url VARCHAR(500) NOT NULL,
    title VARCHAR(255),
    description TEXT,
    caption VARCHAR(500),
    media_source ENUM('upload', 'external', 'instagram', 'twitter') DEFAULT 'upload',
    is_featured BOOLEAN DEFAULT FALSE,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE,
    KEY idx_player_media (player_id, is_featured)
);
```

### 2. `igk_batting_stats` (Batting Statistics)

```sql
CREATE TABLE igk_batting_stats (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,
    tournament VARCHAR(255) NOT NULL,
    matches INT DEFAULT 0,
    innings INT DEFAULT 0,
    not_out INT DEFAULT 0,
    runs INT DEFAULT 0,
    balls_faced INT DEFAULT 0,
    centuries INT DEFAULT 0,
    half_centuries INT DEFAULT 0,
    fours INT DEFAULT 0,
    sixes INT DEFAULT 0,
    strike_rate DECIMAL(5, 2) DEFAULT 0,
    average DECIMAL(5, 2) DEFAULT 0,
    highest_score INT DEFAULT 0,
   
    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE
);
```

### 3. `igk_bowling_stats` (Bowling Statistics)

```sql
CREATE TABLE igk_bowling_stats (
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT NOT NULL,
    tournament VARCHAR(255) NOT NULL,
    matches INT DEFAULT 0,
    innings INT DEFAULT 0,
    overs DECIMAL(5, 1) DEFAULT 0,
    balls INT DEFAULT 0,
    runs INT DEFAULT 0,
    wickets INT DEFAULT 0,
    economy_rate DECIMAL(5, 2) DEFAULT 0,
    dot_balls INT DEFAULT 0,
    maidens INT DEFAULT 0,
    average DECIMAL(5, 2) DEFAULT 0,
    strike_rate DECIMAL(5, 2) DEFAULT 0,
    
    FOREIGN KEY (player_id) REFERENCES igk_players(id) ON DELETE CASCADE,=
);
```

## API Response Structure

### Get Player Full Profile Response

```json
{
  "player": {
    "id": 1,
    "name": "Abdul Samad",
    "country": "India",
    "type": "All Rounder",
    "profile_image": "https://example.com/abdul-samad.jpg"
  },
  "profile": {
    "date_of_birth": "1999-07-10",
    "age": 26,
    "height_cm": 180,
    "batting_style": "Right-handed",
    "bowling_style": "Right-arm Medium",
    "jersey_number": 13,
    "batting_position": 5,
    "bio": "Indian cricketer who plays for Sunrisers Hyderabad in IPL",
    "role": "Middle Order Batsman & Occasional Bowler"
  },
  "teams": [
    {
      "id": 1,
      "team_name": "Sunrisers Hyderabad",
      "tournament": "Indian Premier League",
      "start_year": 2019,
      "end_year": null,
      "is_current": true
    },
    {
      "id": 2,
      "team_name": "Hyderabad",
      "tournament": "Ranji Trophy",
      "start_year": 2018,
      "end_year": null,
      "is_current": true
    }
  ],
  "social_media": {
    "instagram": {
      "handle": "abdul_samad_19",
      "url": "https://instagram.com/abdul_samad_19"
    },
    "twitter": {
      "handle": "@abdulsamad_19",
      "url": "https://twitter.com/abdulsamad_19"
    },
    "facebook": "https://facebook.com/abdul.samad.19",
    "linkedin": "https://linkedin.com/in/abdul-samad",
    "whatsapp": "https://whatsapp.com/...",
    "telegram": "https://t.me/...",
    "youtube": "https://youtube.com/@abdulsamad",
    "website": "https://abdulsamad.com"
  },
  "media": [
    {
      "id": 1,
      "type": "photo",
      "url": "https://example.com/photo1.jpg",
      "title": "Abdul Samad in Action",
      "description": "Playing for Sunrisers Hyderabad",
      "caption": "Match moment",
      "source": "upload",
      "is_featured": true,
      "upload_date": "2026-04-20"
    },
    {
      "id": 2,
      "type": "photo",
      "url": "https://example.com/photo2.jpg",
      "title": "Profile Picture",
      "source": "instagram",
      "is_featured": false,
      "upload_date": "2026-04-15"
    }
  ],
  "batting_stats": [
    {
      "id": 1,
      "tournament": "Indian Premier League",
      "matches": 66,
      "innings": 55,
      "not_out": 14,
      "runs": 795,
      "balls_faced": 529,
      "centuries": 0,
      "half_centuries": 0,
      "fours": 50,
      "sixes": 51,
      "strike_rate": 150.28,
      "average": 19.39,
      "highest_score": 45
    }
  ],
  "bowling_stats": [
    {
      "id": 1,
      "tournament": "Indian Premier League",
      "matches": 66,
      "innings": 7,
      "overs": 9.3,
      "balls": 57,
      "runs": 125,
      "wickets": 2,
      "economy_rate": 13.16,
      "dot_balls": 12,
      "maidens": 0,
      "average": 62.50,
      "strike_rate": 28.50
    }
  ]
}
```

## Tournaments Supported

- Indian Premier League
- Ranji Trophy
- Vijay Hazare Trophy
- Syed Mushtaq Ali Trophy
- 4-Day Franchise Series
- (Add more as needed)

## Data Types & Field Descriptions

### Player & Profile Fields

| Field | Type | Description |
|-------|------|-------------|
| player_name | VARCHAR(255) | Full name of the player |
| country | VARCHAR(100) | Country of the player |
| player_type | ENUM | Type of player (Batsman, Bowler, All Rounder) |
| date_of_birth | DATE | Player's date of birth (YYYY-MM-DD) |
| age | INT | Current age of the player |
| height_cm | INT | Height in centimeters |
| batting_style | VARCHAR(50) | Right-handed or Left-handed |
| bowling_style | VARCHAR(50) | Bowling style (e.g., Right-arm Medium) |
| jersey_number | INT | Jersey number played with |
| batting_position | INT | Typical batting order position |
| role | VARCHAR(100) | Player's role (Opener, Middle Order, Lower Order, etc.) |
| bio | TEXT | Player biography or description |

### Teams & Social Media Fields

| Field | Type | Description |
|-------|------|-------------|
| team_name | VARCHAR(255) | Name of the team |
| tournament | VARCHAR(255) | Tournament name (IPL, Ranji, etc.) |
| is_current | BOOLEAN | Whether player currently plays for this team |
| instagram_handle | VARCHAR(255) | Instagram username |
| twitter_handle | VARCHAR(255) | Twitter/X username |
| facebook_url | VARCHAR(500) | Facebook profile URL |
| linkedin_url | VARCHAR(500) | LinkedIn profile URL |
| youtube_channel | VARCHAR(500) | YouTube channel URL |
| website_url | VARCHAR(500) | Personal website URL |

### Media Fields

| Field | Type | Description |
|-------|------|-------------|
| media_type | ENUM | Type: photo, video, or gallery |
| media_url | VARCHAR(500) | URL to the media file |
| title | VARCHAR(255) | Title of the media |
| description | TEXT | Detailed description |
| caption | VARCHAR(500) | Short caption for the media |
| media_source | ENUM | Source: upload, external, instagram, twitter |
| is_featured | BOOLEAN | Whether media should be featured/highlighted |

### Batting & Bowling Fields

| Field | Type | Description |
|-------|------|-------------|
| matches | INT | Number of matches played |
| innings | INT | Number of innings played |
| not_out | INT | Number of times not out |
| runs | INT | Total runs scored |
| balls_faced | INT | Total balls faced while batting |
| centuries | INT | Number of 100+ run scores |
| half_centuries | INT | Number of 50+ run scores |
| fours | INT | Number of boundary hits (4 runs) |
| sixes | INT | Number of over boundary hits (6 runs) |
| strike_rate | DECIMAL(5,2) | Runs per 100 balls (Batting) |
| average | DECIMAL(5,2) | Runs per innings (Batting) or Runs per wicket (Bowling) |
| highest_score | INT | Highest individual score |
| overs | DECIMAL(5,1) | Overs bowled (format: X.Y where Y is balls) |
| balls | INT | Total balls bowled |
| wickets | INT | Total wickets taken |
| economy_rate | DECIMAL(5,2) | Runs per over |
| dot_balls | INT | Number of balls without runs |
| maidens | INT | Number of maiden overs |

## Indexes for Performance

```sql
-- Player & Profile Indexes
CREATE INDEX idx_player_country ON igk_players(country);
CREATE INDEX idx_player_type ON igk_players(player_type);

-- Team Indexes
CREATE INDEX idx_team_player ON igk_player_teams(player_id);
CREATE INDEX idx_team_name ON igk_player_teams(team_name);
CREATE INDEX idx_team_current ON igk_player_teams(player_id, is_current);

-- Social Media Indexes
CREATE INDEX idx_social_player ON igk_social_media(player_id);

-- Media Indexes
CREATE INDEX idx_media_player ON igk_player_media(player_id);
CREATE INDEX idx_media_featured ON igk_player_media(player_id, is_featured);
CREATE INDEX idx_media_type ON igk_player_media(media_type);

-- Batting Stats Indexes
CREATE INDEX idx_batting_player ON igk_batting_stats(player_id);
CREATE INDEX idx_batting_tournament ON igk_batting_stats(tournament);

-- Bowling Stats Indexes
CREATE INDEX idx_bowling_player ON igk_bowling_stats(player_id);
CREATE INDEX idx_bowling_tournament ON igk_bowling_stats(tournament);
```

## Notes

- All decimal fields use DECIMAL(5,2) for precision up to 999.99
- Overs are stored as DECIMAL(5,1) to handle formats like 9.3 (9 overs, 3 balls)
- Foreign keys ensure data integrity
- Unique constraints prevent duplicate tournament records per player
