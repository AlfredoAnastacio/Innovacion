/*var config = {
        container: "#custom-colored",

        nodeAlign: "BOTTOM",

        connectors: {
            type: 'step'
        },
        node: {
            HTMLclass: 'nodeExample1'
        }
    },
    ceo = {
        text: {
            name: "Tu: 1234",

        },
        image: "./img/avatar.png"
    },

    cto = {
        parent: ceo,
        HTMLclass: 'blue',
        text:{
            name: "N9: 001",

        },
        image: "./img/avatar.png"
    },
    cbo = {
        parent: ceo,
        childrenDropLevel: 2,
        HTMLclass: 'blue',
        text:{
            name: "N9: 002",

        },
        image: "./img/avatar.png"
    },

    cio = {
        parent: cto,
        HTMLclass: 'blue',
        text:{
            name: "N9: 003",

        },
        image: "./img/avatar.png"
    },
    cio2 = {
        parent: cto,
        HTMLclass: 'blue',
        text:{
            name: "N9: 004",

        },
        image: "./img/avatar.png"
    },
    cio3 = {
        parent: cio2,
        HTMLclass: 'blue',
        text:{
            name: "N9: 008",

        },
        image: "./img/avatar.png"
    },
    cio4 = {
        parent: cio2,
        HTMLclass: 'blue',
        text:{
            name: "N9: 009",

        },
        image: "./img/avatar.png"
    },
    ciso = {
        parent: cto,
        HTMLclass: 'blue',
        text:{
            name: "N9: 005",

        },
        image: "./img/avatar.png"
    },

    ciso2 = {
        parent: cbo,
        HTMLclass: 'blue',
        text:{
            name: "N9: 006",

        },
        image: "./img/avatar.png"
    },
    ciso3 = {
        parent: cbo,
        HTMLclass: 'blue',
        text:{
            name: "N9: 007",

        },
        image: "./img/avatar.png"
    },
    ciso4 = {
        parent: ciso3,
        HTMLclass: 'blue',
        text:{
            name: "N9: 010",

        },
        image: "./img/avatar.png"
    },
     ciso5 = {
        parent: ciso4,
        HTMLclass: 'blue',
        text:{
            name: "N9: 010",

        },
        image: "./img/avatar.png"
    },
    chart_config = [
        config,
        ceo,cto,cbo,
        cio,ciso2,ciso2,ciso3,cio2,cio3,cio4,ciso4,ciso5
    ];
*/
    // Another approach, same result
    // JSON approach


    var chart_config = {
        chart: {
            container: "#custom-colored",

            nodeAlign: "BOTTOM",

            connectors: {
                type: 'step'
            },
            node: {
                HTMLclass: 'nodeExample1'
            }
        },
        nodeStructure: {
            text: {
                name: "Mark Hill",
                title: "Chief executive officer",
                contact: "Tel: 01 213 123 134",
            },
            image: "/images/avatar.png",
            children: [
                {
                    text:{
                        name: "Joe Linux",
                        title: "Chief Technology Officer",
                    },
                    image: "/images/avatar.png",
                    HTMLclass: 'blue',
                    children: [
                        {
                            text:{
                                name: "Ron Blomquist",
                                title: "Chief Information Security Officer"
                            },
                            HTMLclass: 'blue',
                            image: "/images/avatar.png",
                        },
                        {
                            text:{
                                name: "Michael Rubin",
                                title: "Chief Innovation Officer",
                                contact: "we@aregreat.com"
                            },
                            HTMLclass: 'blue',
                            image: "/images/avatar.png",
                        }
                    ]
                },
                {
                    childrenDropLevel: 2,
                    text:{
                        name: "Linda May",
                        title: "Chief Business Officer",
                    },
                    HTMLclass: 'blue',
                    image: "/images/avatar.png",
                    children: [
                        {
                            text:{
                                name: "Alice Lopez",
                                title: "Chief Communications Officer"
                            },
                            HTMLclass: 'blue',
                            image: "/images/avatar.png"
                        },
                        {
                            text:{
                                name: "Mary Johnson",
                                title: "Chief Brand Officer"
                            },
                            HTMLclass: 'blue',
                            image: "/images/avatar.png"
                        },
                        {
                            text:{
                                name: "Kirk Douglas",
                                title: "Chief Business Development Officer"
                            },
                            HTMLclass: 'blue',
                            image: "/images/avatar.png"
                        }
                    ]
                },
                {
                    text:{
                        name: "John Green",
                        title: "Chief accounting officer",
                        contact: "Tel: 01 213 123 134",
                    },
                    HTMLclass: 'blue',
                    image: "/images/avatar.png",
                    children: [
                        {
                            text:{
                                name: "Erica Reel",
                                title: "Chief Customer Officer"
                            },
                            link: {
                                href: "http://www.google.com"
                            },
                            HTMLclass: 'blue',
                            image: "/images/avatar.png"
                        }
                    ]
                }
            ]
        }
    };

