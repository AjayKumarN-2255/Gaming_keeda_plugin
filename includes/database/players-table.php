<?php

function igk_create_players_table() {
    global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $charset_collate = $wpdb->get_charset_collate();

    // 1. Main Players Table
    $table_players = $wpdb->prefix . 'igk_players';
    $sql_players = "CREATE TABLE {$table_players} (
        id INT AUTO_INCREMENT PRIMARY KEY,
        player_name VARCHAR(255) NOT NULL UNIQUE,
        title VARCHAR(255),
        country VARCHAR(100),
        player_type ENUM('Batsman', 'Bowler', 'All Rounder') DEFAULT 'All Rounder',
        profile_image_url VARCHAR(500),
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) {$charset_collate};";

    // 2. Player Profiles Table
    $table_profiles = $wpdb->prefix . 'igk_player_profiles';
    $sql_profiles = "CREATE TABLE {$table_profiles} (
        id INT AUTO_INCREMENT PRIMARY KEY,
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
        images JSON,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (player_id) REFERENCES {$table_players}(id) ON DELETE CASCADE
    ) {$charset_collate};";

    // 3. Batting Stats Table
    $table_batting = $wpdb->prefix . 'igk_batting_stats';
    $sql_batting = "CREATE TABLE {$table_batting} (
        id INT AUTO_INCREMENT PRIMARY KEY,
        player_id INT NOT NULL,
        format VARCHAR(50) NOT NULL,
        matches INT DEFAULT 0,
        innings INT DEFAULT 0,
        not_outs INT DEFAULT 0,
        runs INT DEFAULT 0,
        highest_score INT DEFAULT 0,
        average DECIMAL(5,2) DEFAULT 0,
        balls_faced INT DEFAULT 0,
        strike_rate DECIMAL(5,2) DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (player_id) REFERENCES {$table_players}(id) ON DELETE CASCADE,
        UNIQUE(player_id, format)
    ) {$charset_collate};";

    // 4. Bowling Stats Table
    $table_bowling = $wpdb->prefix . 'igk_bowling_stats';
    $sql_bowling = "CREATE TABLE {$table_bowling} (
        id INT AUTO_INCREMENT PRIMARY KEY,
        player_id INT NOT NULL,
        format VARCHAR(50) NOT NULL,
        matches INT DEFAULT 0,
        innings INT DEFAULT 0,
        balls INT DEFAULT 0,
        runs INT DEFAULT 0,
        wickets INT DEFAULT 0,
        best_bowling_innings VARCHAR(20),
        best_bowling_match VARCHAR(20),
        average DECIMAL(5,2) DEFAULT 0,
        economy_rate DECIMAL(5,2) DEFAULT 0,
        strike_rate DECIMAL(5,2) DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (player_id) REFERENCES {$table_players}(id) ON DELETE CASCADE,
        UNIQUE(player_id, format)
    ) {$charset_collate};";

    // 5. Player Contracts Table
    $table_contracts = $wpdb->prefix . 'igk_player_contracts';
    $sql_contracts = "CREATE TABLE {$table_contracts} (
        id INT AUTO_INCREMENT PRIMARY KEY,
        player_id INT NOT NULL,
        year YEAR NOT NULL,
        team VARCHAR(255) NOT NULL,
        salary DECIMAL(10,2) DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (player_id) REFERENCES {$table_players}(id) ON DELETE CASCADE,
        UNIQUE(player_id, year)
    ) {$charset_collate};";

    // Execute all table creations
    dbDelta( $sql_players );
    dbDelta( $sql_profiles );
    dbDelta( $sql_batting );
    dbDelta( $sql_bowling );
    dbDelta( $sql_contracts );
}
