// src/App.js
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import socketIOClient from 'socket.io-client';
import './App.css';

const ENDPOINT = "http://192.168.1.10:3000";

function App() {
    const [symbol, setSymbol] = useState('AAPL');
    const [stockData, setStockData] = useState(null);

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios(`/api/stock/${symbol}`);
            setStockData(result.data);
        };
        fetchData();
    }, [symbol]);

    useEffect(() => {
        const socket = socketIOClient(ENDPOINT);
        socket.on('FromAPI', data => {
            setStockData(data);
        });

        return () => socket.disconnect();
    }, []);

    return (
        <div className="App">
            <header className="App-header">
                <h1>{symbol} Stock Data</h1>
                <input value={symbol} onChange={e => setSymbol(e.target.value.toUpperCase())} />
                <StockChart data={stockData} />
            </header>
        </div>
    );
}

const StockChart = ({ data }) => {
    if (!data) return <div>Loading...</div>;

    const timeSeries = data['Time Series (1min)'];
    const chartData = Object.keys(timeSeries).map(key => ({
        time: key,
        value: parseFloat(timeSeries[key]['1. open']),
    }));

    return (
        <div>
            <h2>Stock Chart</h2>
            <ul>
                {chartData.map(point => (
                    <li key={point.time}>{point.time}: {point.value}</li>
                ))}
            </ul>
        </div>
    );
}

export default App;
