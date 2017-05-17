    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaDay,agendaWeek,month'
                },
                defaultDate: new Date(),
                businessHours: true, // display business hours
                editable: true,
                firstDay: 1,
                slotDuration: '00:15:00',
                slotLabelInterval: '01:00:00',
                defaultView: 'agendaWeek',
                dayClick: function(date, jsEvent, view) {
                    $( "#dialog" ).dialog("open");
                },
                events: [
                    {
                        title: 'Business Lunch',
                        start: '2016-01-03T13:00:00',
                        constraint: 'businessHours'
                    },
                    {
                        title: 'Meeting',
                        start: '2016-01-13T11:00:00',
                        color: '#257e4a'
                    }
                ]
            });

        });

        $(function() {
            $( "#dialog" ).dialog({
                autoOpen: false,
                dialogClass: "no-close",
                buttons: {
                    "Save": function() {
                        $( this ).dialog( "close" );
                    },
                    "Cancel": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        #event_edit_container label {
            display: block;
            margin-top: 1em;
            margin-bottom: 0.5em;
        }

        form ul {
            padding: 0.3em;
        }

        select, input[type='text'], textarea {
            width: 250px;
            padding: 3px;
        }

        input[type='text'] {
            width: 245px;
        }

        ul.formatted,ol.formatted {
            display: block;
            margin: 1em 0.5em;
        }

        ul.formatted li,ol.formatted li {
            margin: 5px 30px;
            display: auto;
        }

        li {
            list-style-type:none;
            margin: 0.4em;
        }

        .no-close .ui-dialog-titlebar-close {
            display: none;
        }

    </style>
</head>
<body>
<div id="dialog" title="Basic dialog">
    <form>
        <input type="hidden" />
        <ul>
            <li>
                <span>Date: </span><span class="date_holder"></span>
            </li>
            <li>
                <label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
            </li>
            <li>
                <label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
            </li>
            <li>
                <label for="patient">Patient: </label><select name="patient"><option value="0">Select Patient</option></select>
            </li>
            <li>
                <label for="emergency">Emergency: </label><input type="checkbox" name="emergency"/>
            </li>
            <li>
                <label for="info">Informations: </label><textarea name="info"></textarea>
            </li>
        </ul>
    </form>
</div>
<div id='calendar'></div>

</body>
</html>
