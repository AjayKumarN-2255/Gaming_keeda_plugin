export const getPlayersDetail = async () => {
  const res = await fetch("http://localhost:10009/graphql", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      query: `
        query GetPage {
          players {
            basic {
              player_name
              country
              player_type
              profile_image_url
            }
          }
        }
      `,
    }),
  });

  return res.json();
};


export const addPlayer = async (playerData) => {
  const res = await fetch("http://localhost:10009/wp-json/igk/v1/player", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(playerData),
  });

  return res.json();
};
