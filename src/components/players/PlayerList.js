import React from 'react'

function PlayerList() {
    return (
        <div><div>
            <h2>Players list </h2>

            <form>
                <input type="text" placeholder="Player name" />
            </form>

            <ul>
                <li>Player 1</li>
                <li>Player 2</li>
            </ul>
        </div></div>
    )
}

export default PlayerList