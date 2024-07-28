// server.js
const express = require('express');
const axios = require('axios');
const app = express();
const port = 3000;

const ALPHA_VANTAGE_API_KEY = 'VEWSZ1LN7ZW1AQUQ';

app.get('/api/stock/:symbol', async (req, res) => {
    try {
        const { symbol } = req.params;
        const response = await axios.get(`https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=1min&apikey=${ALPHA_VANTAGE_API_KEY}`);
        res.json(response.data);
    } catch (error) {
        res.status(500).send('Error fetching data from Alpha Vantage API');
    }
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
