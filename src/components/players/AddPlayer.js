import React, { useReducer, useState } from "react";
import { reducer, initialState } from "../../utils/reducer.js";
import Basic from "./comp/Basic.js";
import Profile from "./comp/Profile.js";
import Batting from "./comp/Batting.js";
import Bowling from "./comp/Bowling.js";
import Contract from "./comp/Contract.js";

function AddPlayer() {

    const [state, dispatch] = useReducer(reducer, initialState);
    const [tab, setTab] = useState("batting");
    const tabs = [
        { key: "batting", label: "Batting" },
        { key: "bowling", label: "Bowling" },
        { key: "contract", label: "Contract" },
    ];

    const renderTab = () => {
        switch (tab) {
            case "batting":
                return <Batting state={state} dispatch={dispatch} />;

            case "bowling":
                return <Bowling state={state} dispatch={dispatch} />;

            case "contract":
                return <Contract state={state} dispatch={dispatch} />;

            default:
                return null;
        }
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        console.log("SUBMIT DATA:", state);

        // Example API call
        // fetch("/wp-json/player/create", {
        //   method: "POST",
        //   headers: { "Content-Type": "application/json" },
        //   body: JSON.stringify(state)
        // });
    };

    return (
        <form onSubmit={handleSubmit} className="igk-p-4 igk-w-full igk-min-h-screen">

            <h1 className="igk-text-2xl igk-font-bold igk-mb-4">
                Add Player
            </h1>

            <div className="igk-bg-white igk-p-4 igk-rounded-lg igk-shadow-md">

                <div className="igk-grid igk-grid-cols-1 md:igk-grid-cols-3 igk-gap-4 igk-auto-rows-fr">
                    <div className="md:igk-col-span-1 igk-flex igk-flex-col">
                        <Basic state={state} dispatch={dispatch} />
                    </div>

                    <div className="md:igk-col-span-2 igk-flex igk-flex-col">
                        <Profile state={state} dispatch={dispatch} />
                    </div>
                </div>

                <div className="igk-flex igk-gap-2 igk-border-b igk-mb-4">
                    {tabs.map((t) => (
                        <button
                            type="button"
                            key={t.key}
                            onClick={() => setTab(t.key)}
                            className={`igk-px-4 igk-py-2 igk-cursor-pointer igk-text-sm igk-font-medium igk-border-b-2 ${tab === t.key
                                ? "igk-border-black igk-text-black"
                                : "igk-border-transparent igk-text-gray-500"
                                }`}
                        >
                            {t.label}
                        </button>
                    ))}
                </div>
                <div className="igk-flex-1">
                    {renderTab()}
                </div>

                <button
                    type="submit"
                    className="igk-mt-4 igk-bg-blue-600 igk-text-white igk-px-4 igk-py-2 igk-rounded"
                >
                    Save Player
                </button>

            </div>
        </form>
    );
}

export default AddPlayer;