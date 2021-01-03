import React, {Component} from 'react';
import Head from 'next/head';
import Layout, {siteName, siteTitle} from '../components/layout';
import {Container } from 'react-bootstrap';

class Index extends Component{
  constructor(props) {
    super(props)
    this.state = {
        loading: true
    }
  
}
    componentDidMount() {
   
  }
  render(){

    return(
    <Layout home>
      <Head>
        <title>Welcome - {siteTitle}</title>
      </Head>
    
    
    </Layout>
  );
}
}

export default Index;