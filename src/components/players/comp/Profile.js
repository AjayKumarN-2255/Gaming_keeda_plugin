import React from "react";

function Profile({ state, dispatch }) {
  const profile = state.profile;

  const handleChange = (field, value) => {
    dispatch({
      type: "UPDATE_PROFILE",
      field,
      value,
    });
  };

  return (
    <div className="igk-p-4 igk-bg-gray-100 igk-rounded-md igk-h-full igk-flex igk-flex-col">

      <h2 className="igk-text-lg igk-font-semibold igk-mb-4">
        Profile Info
      </h2>

      <div className="igk-grid igk-grid-cols-1 md:igk-grid-cols-2 igk-gap-4">

        {/* LEFT COLUMN */}
        <div className="igk-space-y-3">

          <div>
            <label className="igk-text-sm igk-font-medium">Date of Birth</label>
            <input
              type="date"
              value={profile.date_of_birth || ""}
              onChange={(e) => handleChange("date_of_birth", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Height (cm)</label>
            <input
              type="number"
              value={profile.height_cm || ""}
              onChange={(e) => handleChange("height_cm", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Batting Style</label>
            <input
              type="text"
              value={profile.batting_style || ""}
              onChange={(e) => handleChange("batting_style", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Bowling Style</label>
            <input
              type="text"
              value={profile.bowling_style || ""}
              onChange={(e) => handleChange("bowling_style", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Jersey Number</label>
            <input
              type="text"
              value={profile.jersey_number || ""}
              onChange={(e) => handleChange("jersey_number", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Teams</label>
            <input
              type="text"
              value={(profile.teams || []).join(", ")}
              onChange={(e) =>
                handleChange(
                  "teams",
                  e.target.value.split(",").map((t) => t.trim())
                )
              }
              className="igk-w-full igk-p-2 igk-border igk-rounded"
              placeholder="Enter teams separated by comma"
            />
          </div>

        </div>

        {/* RIGHT COLUMN */}
        <div className="igk-space-y-3">

          <div>
            <label className="igk-text-sm igk-font-medium">Role</label>
            <input
              type="text"
              value={profile.role || ""}
              onChange={(e) => handleChange("role", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Debut Date</label>
            <input
              type="date"
              value={profile.debut_date || ""}
              onChange={(e) => handleChange("debut_date", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Retirement Date</label>
            <input
              type="date"
              value={profile.retirement_date || ""}
              onChange={(e) => handleChange("retirement_date", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Father Name</label>
            <input
              type="text"
              value={profile.father_name || ""}
              onChange={(e) => handleChange("father_name", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Mother Name</label>
            <input
              type="text"
              value={profile.mother_name || ""}
              onChange={(e) => handleChange("mother_name", e.target.value)}
              className="igk-w-full igk-p-2 igk-border igk-rounded"
            />
          </div>

          <div>
            <label className="igk-text-sm igk-font-medium">Social Media</label>
            <input
              type="text"
              value={(profile.social_media || []).join(", ")}
              onChange={(e) =>
                handleChange(
                  "social_media",
                  e.target.value.split(",").map((s) => s.trim())
                )
              }
              className="igk-w-full igk-p-2 igk-border igk-rounded"
              placeholder="Enter social media links separated by comma"
            />
          </div>

        </div>
      </div>
      <div className="igk-mt-2">
        <label className="igk-text-sm igk-font-medium">Age</label>
        <input
          type="number"
          value={profile.age || ""}
          onChange={(e) => handleChange("age", e.target.value)}
          className="igk-w-full igk-p-2 igk-border igk-rounded"
          placeholder="Enter age"
        />
      </div>
    </div>
  );
}

export default Profile;