import React, { Component } from "react";
import '../styles/argon.min.css';
import '../styles/style.css';
import 'react-toastify/dist/ReactToastify.css';
import { ToastContainer } from 'react-toastify';

class App extends Component {

  render() {
    const { Component, pageProps } = this.props;

    return (   
    <>
    <Component {...pageProps} />
    <ToastContainer />
    </>
    );
  }
}

export default App;