export function reducer(state, action) {
    switch (action.type) {

        case "UPDATE_BASIC":
            return {
                ...state,
                basic: {
                    ...state.basic,
                    [action.field]: action.value
                }
            };

        case "UPDATE_PROFILE":
            return {
                ...state,
                profile: {
                    ...state.profile,
                    [action.field]: action.value
                }
            };

        case "SET_BATTING":
            return {
                ...state,
                batting: action.payload
            };

        case "SET_BOWLING":
            return {
                ...state,
                bowling: action.payload
            };

        case "SET_CONTRACTS":
            return {
                ...state,
                contracts: action.payload
            };

        default:
            return state;
    }
}

export const initialState = {
    basic: {
        player_name: "",
        country: "",
        player_type: "All Rounder",
        profile_image_url: "",
    },

    profile: {
        date_of_birth: "",
        age: "",
        height_cm: "",
        batting_style: "",
        bowling_style: "",
        jersey_number: "",
        role: "",
        debut_date: "",
        retirement_date: "",
        father_name: "",
        mother_name: "",
        teams: [],
        social_media: [],
        images: []
    },

    batting: [

    ],

    bowling: [

    ],

    contracts: [

    ],
};

export const battingFields = [
    { key: "format", label: "Format", type: "text" },
    { key: "matches", label: "Matches", type: "number" },
    { key: "innings", label: "Innings", type: "number" },
    { key: "not_outs", label: "Not Outs", type: "number" },
    { key: "runs", label: "Runs", type: "number" },
    { key: "highest_score", label: "HS", type: "number" },
    { key: "average", label: "Avg", type: "number" },
    { key: "balls_faced", label: "Balls", type: "number" },
    { key: "strike_rate", label: "SR", type: "number" },
];

export const bowlingFields = [
    { key: "format", label: "Format", type: "text", placeholder: "e.g. T20 / ODI / Test" },
    { key: "matches", label: "Matches", type: "number", placeholder: "Matches played" },
    { key: "innings", label: "Innings", type: "number", placeholder: "Bowling innings" },
    { key: "balls", label: "Balls", type: "number", placeholder: "Balls bowled" },
    { key: "runs", label: "Runs", type: "number", placeholder: "Runs conceded" },
    { key: "wickets", label: "Wickets", type: "number", placeholder: "Wickets taken" },
    { key: "best_bowling_innings", label: "BBI", type: "text", placeholder: "e.g. 5/24" },
    { key: "best_bowling_match", label: "BBM", type: "text", placeholder: "e.g. 8/60" },
    { key: "average", label: "Average", type: "number", placeholder: "Bowling average" },
    { key: "economy_rate", label: "Economy", type: "number", placeholder: "Economy rate" },
    { key: "strike_rate", label: "SR", type: "number", placeholder: "Strike rate" },
];

export const contractFields = [
    { key: "year", label: "Year", type: "number", placeholder: "Contract year" },
    { key: "team", label: "Team", type: "text", placeholder: "Team name" },
    { key: "salary", label: "Salary", type: "number", placeholder: "Salary in USD" },
];