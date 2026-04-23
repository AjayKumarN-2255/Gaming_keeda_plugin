import React from 'react'

function EditPlayer() {
    return (
        <div><div>
            <h2>Players Module</h2>

            <form>
                <input type="text" placeholder="Player name" />
                <button type="submit">edit Player</button>
            </form>

            <ul>
                <li>Player 1</li>
                <li>Player 2</li>
            </ul>
        </div></div>
    )
}

export default EditPlayer