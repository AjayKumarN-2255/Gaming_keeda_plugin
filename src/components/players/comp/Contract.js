import React, { useState } from "react";
import { contractFields } from "../../../utils/reducer.js";

function Contract({ state, dispatch }) {
  const contracts = state?.contracts || [];
  const initialState = Object.fromEntries(contractFields.map(f => [f.key, ""]));
  const fields = contractFields;
  const [form, setForm] = useState(initialState);

  const handleChange = (field, value) => {
    setForm((prev) => ({
      ...prev,
      [field]: value,
    }));
  };

  const handleAdd = () => {

    const hasEmpty = Object.values(form).some(
      (value) => value === "" || value === null || value === undefined
    );

    if (hasEmpty) {
      alert("Please fill all fields before adding");
      return;
    }

    dispatch({
      type: "SET_CONTRACTS",
      payload: [...contracts, { ...form }],
    });

    setForm(initialState);
  };

  return (
    <div className="igk-p-4 igk-bg-gray-100 igk-rounded-md igk-flex igk-flex-col igk-gap-4 igk-mt-4">

      <h2 className="igk-text-lg igk-font-semibold">
        Player Contracts
      </h2>

      {/* INPUT FORM */}
      <div className="igk-grid igk-grid-cols-4 igk-gap-2 igk-bg-white igk-p-3 igk-rounded">

        {fields.map((field) => (
          <div key={field.key}>
            <label className="igk-text-xs igk-font-medium igk-block igk-mb-1">
              {field.label}
            </label>
            <input
              type={field.type}
              className="igk-p-2 igk-border igk-rounded igk-w-full"
              value={form[field.key]}
              onChange={(e) => handleChange(field.key, e.target.value)}
              placeholder={field.placeholder}
            />
          </div>
        ))}

        <div>
          <label className="igk-text-xs igk-font-medium igk-block igk-mb-1">&nbsp;</label>
          <button
            type="button"
            onClick={handleAdd}
            className="igk-bg-black igk-text-white igk-rounded igk-p-2 igk-w-full"
          >
            Add
          </button>
        </div>

      </div>

      {/* TABLE */}
      {contracts.length > 0 && (
        <div className="igk-overflow-x-auto">
          <table className="igk-w-full igk-bg-white igk-rounded">

            <thead className="igk-bg-gray-200">
              <tr>
                {
                  fields.map((field) => (
                    <th key={field.key} className="igk-p-2 igk-text-left">
                      {field.label}
                    </th>
                  ))
                }
              </tr>
            </thead>

            <tbody>
              {contracts.length > 0 && contracts.map((c, i) => (
                <tr key={i} className="igk-border-t">
                  {fields.map((f) => (
                    <td key={f.key} className="igk-p-2">
                      {c[f.key]}
                    </td>
                  ))}
                </tr>
              ))}
            </tbody>

          </table>
        </div>
      )}
    </div>
  );
}

export default Contract;