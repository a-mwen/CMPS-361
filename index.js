const express = require('express');
const app = express();

// Middleware to parse JSON bodies
app.use(express.json());

// Sample teams data
const teams = [
    { id: 1, team: 'Steelers', supervisor: 'John Doe', city: 'Pittsburgh' },
    { id: 2, team: 'Penguins', supervisor: 'Jane Smith', city: 'Pittsburgh' },
    { id: 3, team: 'Pirates', supervisor: 'Alice Johnson', city: 'Pittsburgh' },
    { id: 4, team: 'Bengals', supervisor: 'Mark Lee', city: 'Cincinnati' },
    { id: 5, team: 'Browns', supervisor: 'Sara Wilson', city: 'Cleveland' },
    { id: 6, team: 'Ravens', supervisor: 'Tom Brown', city: 'Baltimore' },
    { id: 7, team: 'Packers', supervisor: 'Emma White', city: 'Green Bay' },
    { id: 8, team: 'Cowboys', supervisor: 'James Green', city: 'Dallas' },
    { id: 9, team: 'Giants', supervisor: 'Olivia Taylor', city: 'New York' },
    { id: 10, team: '49ers', supervisor: 'David Martinez', city: 'San Francisco' },
    { id: 11, team: 'Seahawks', supervisor: 'Sophia Garcia', city: 'Seattle' },
    { id: 12, team: 'Dolphins', supervisor: 'Lucas Rodriguez', city: 'Miami' },
    { id: 13, team: 'Falcons', supervisor: 'Mia Hernandez', city: 'Atlanta' },
    { id: 14, team: 'Lions', supervisor: 'Noah Lopez', city: 'Detroit' },
    { id: 15, team: 'Texans', supervisor: 'Ava Wilson', city: 'Houston' },
    { id: 16, team: 'Jaguars', supervisor: 'Ethan Lee', city: 'Jacksonville' },
    { id: 17, team: 'Vikings', supervisor: 'Isabella King', city: 'Minneapolis' },
    { id: 18, team: 'Saints', supervisor: 'Liam Davis', city: 'New Orleans' },
    { id: 19, team: 'Chargers', supervisor: 'Charlotte Martinez', city: 'Los Angeles' },
    { id: 20, team: 'Titans', supervisor: 'Alexander Miller', city: 'Nashville' },
    { id: 21, team: 'Raiders', supervisor: 'Amelia Wilson', city: 'Las Vegas' },
    { id: 22, team: 'Eagles', supervisor: 'Michael White', city: 'Philadelphia' },
    { id: 23, team: 'Patriots', supervisor: 'Harper Anderson', city: 'Foxborough' },
    { id: 24, team: 'Cardinals', supervisor: 'Benjamin Brown', city: 'Phoenix' },
    { id: 25, team: 'Buccaneers', supervisor: 'Ella Green', city: 'Tampa' },
    { id: 26, team: 'Bills', supervisor: 'Aiden Jackson', city: 'Buffalo' },
    { id: 27, team: 'Panthers', supervisor: 'Chloe Young', city: 'Charlotte' },
    { id: 28, team: 'Colts', supervisor: 'Daniel Turner', city: 'Indianapolis' },
    { id: 29, team: 'Bears', supervisor: 'Grace Adams', city: 'Chicago' },
    { id: 30, team: 'Texans', supervisor: 'Samuel Hall', city: 'Houston' },
    { id: 31, team: 'Redskins', supervisor: 'Victoria Lee', city: 'Washington' },
    { id: 32, team: 'Dolphins', supervisor: 'Jackson Scott', city: 'Miami' },
];


// Get all teams
app.get('/api/teams', (req, res) => {
    res.send(teams);
});

// Add a new team
app.post('/api/teams', (req, res) => {
    const newTeam = {
        id: teams.length + 1, // Automatically assign an ID
        team: req.body.team, // Ensure the request body contains 'team'
        supervisor: req.body.supervisor, // Added supervisor
        city: req.body.city // Added city
    };

    // Validate the incoming data
    if (!newTeam.team || !newTeam.supervisor || !newTeam.city) {
        return res.status(400).send('Team, supervisor, and city are required.');
    }

    // Add new team to the array
    teams.push(newTeam);

    // Return the newly added team
    res.status(201).send(newTeam);
});

// Configuration
const port = process.env.PORT || 4021;
app.listen(port, () => console.log(`Listening on port ${port}`));
