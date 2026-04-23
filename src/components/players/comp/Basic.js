import React from "react";

function Basic({ state, dispatch }) {
  const basic = state.basic;

  const handleChange = (field, value) => {
    dispatch({
      type: "UPDATE_BASIC",
      field,
      value,
    });
  };

  return (
    <div className="igk-p-4 igk-bg-gray-100 igk-rounded-md igk-mb-4 igk-h-full igk-flex igk-flex-col">

      <h2 className="igk-text-lg igk-font-semibold igk-mb-4">
        Basic Info
      </h2>

      <div className="igk-space-y-3">

        {/* Player Name */}
        <div>
          <label className="igk-text-sm igk-font-medium">Player Name</label>
          <input
            type="text"
            value={basic.player_name}
            onChange={(e) => handleChange("player_name", e.target.value)}
            className="igk-w-full igk-p-2 igk-border igk-rounded"
            placeholder="Enter player name"
          />
        </div>

        {/* Country */}
        <div>
          <label className="igk-text-sm igk-font-medium">Country</label>
          <input
            type="text"
            value={basic.country}
            onChange={(e) => handleChange("country", e.target.value)}
            className="igk-w-full igk-p-2 igk-border igk-rounded"
            placeholder="Enter country"
          />
        </div>

        {/* Player Type */}
        <div>
          <label className="igk-text-sm igk-font-medium">Player Type</label><br />
          <select
            value={basic.player_type}
            onChange={(e) => handleChange("player_type", e.target.value)}
            className="igk-w-full igk-p-2 igk-border igk-rounded"
          >
            <option value="all_rounder">All Rounder</option>
            <option value="batsman">Batsman</option>
            <option value="bowler">Bowler</option>
            <option value="wicket_keeper">Wicket Keeper</option>
          </select><br />
        </div>

        {/* Profile Image URL */}
        <div>
          <label className="igk-text-sm igk-font-medium">Profile Image URL</label>
          <input
            type="text"
            value={basic.profile_image_url}
            onChange={(e) => handleChange("profile_image_url", e.target.value)}
            className="igk-w-full igk-p-2 igk-border igk-rounded"
            placeholder="Enter image URL"
          />
        </div>

      </div>
    </div>
  );
}

export default Basic;