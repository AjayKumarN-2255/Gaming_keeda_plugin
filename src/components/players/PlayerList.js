import { useEffect, useState } from "react";
import { getPlayersDetail } from "../../utils/helper.js";

function PlayerList() {
    const [players, setPlayers] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        getPlayersDetail().then((res) => {
            setPlayers(res?.data?.players || []);
            setLoading(false);
        });
    }, []);

    const handleDelete = (playerName, index) => {
        if (window.confirm(`Are you sure you want to delete "${playerName}"?`)) {
            // TODO: Add API call to delete player
            console.log("Delete player:", playerName);
            // Remove from state
            setPlayers(players.filter((_, i) => i !== index));
        }
    };

    return (
        <div className="igk-wrap">
            <div className="wp-admin" style={{ maxWidth: '1200px', margin: '0 auto', paddingTop: '20px' }}>
                <h1 className="wp-heading-inline">Players</h1>
                
                <hr className="wp-header-end" />

                {loading ? (
                    <p>Loading players...</p>
                ) : players.length === 0 ? (
                    <p className="notice notice-info"><strong>No players found.</strong></p>
                ) : (
                    <table className="widefat striped">
                        <thead>
                            <tr>
                                <th style={{ width: '10%', textAlign: 'center' }}>Image</th>
                                <th style={{ width: '25%' }}>Player Name</th>
                                <th style={{ width: '20%' }}>Country</th>
                                <th style={{ width: '20%' }}>Type</th>
                                <th style={{ width: '25%' }}>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {players.map((player, index) => {
                                const basic = player?.basic;
                                return (
                                    <tr key={index}>
                                        <td style={{ textAlign: 'center' }}>
                                            <img
                                                src={basic?.profile_image_url}
                                                alt={basic?.player_name}
                                                style={{
                                                    width: '50px',
                                                    height: '50px',
                                                    borderRadius: '50%',
                                                    objectFit: 'cover',
                                                    border: '2px solid #ddd'
                                                }}
                                            />
                                        </td>
                                        <td>
                                            <strong>{basic?.player_name || 'N/A'}</strong>
                                        </td>
                                        <td>
                                            {basic?.country || '-'}
                                        </td>
                                        <td>
                                            <span style={{
                                                display: 'inline-block',
                                                padding: '3px 8px',
                                                backgroundColor: '#f0f0f0',
                                                borderRadius: '3px',
                                                fontSize: '12px'
                                            }}>
                                                {basic?.player_type || 'N/A'}
                                            </span>
                                        </td>
                                        <td>
                                            <button
                                                onClick={() => handleDelete(basic?.player_name, index)}
                                                className="button button-small button-link-delete"
                                                style={{
                                                    color: '#a00',
                                                    textDecoration: 'none',
                                                    cursor: 'pointer',
                                                    padding: '0',
                                                    border: 'none',
                                                    background: 'none',
                                                    fontSize: '13px'
                                                }}
                                            >
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                );
                            })}
                        </tbody>
                    </table>
                )}
            </div>
        </div>
    );
}

export default PlayerList;