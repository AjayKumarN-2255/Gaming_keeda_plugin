import React from 'react';
import AddPlayer from '../players/AddPlayer.js';
import EditPlayer from '../players/EditPlayer.js';
import PlayerList from '../players/PlayerList.js';

function PlayersModule({ view }) {
    console.log(view)
    if (!view) return <div>No View Found</div>;

    if (view === 'igk-players-add') return <AddPlayer />;
    if (view === 'igk-players-edit') return <EditPlayer />;

    return <PlayerList />;
}
export default PlayersModule;