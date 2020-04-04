<template>
    <v-app>
        <v-content>
            <v-container>
                <v-data-table
                        :headers="headers"
                        :items="dailyRecords"
                        hide-default-footer
                >
                </v-data-table>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    const DaysOfWeek = {
        values: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

        size: () => DaysOfWeek.values.length,

        toString: (ordinal) => {
            if (ordinal < 0 || ordinal >= DaysOfWeek.size) {
                throw new Error();
            }
            return DaysOfWeek.values[ordinal];
        }
    }

    const date = (function (date) {
        const properties = {
            year: date.getFullYear(),
            month: date.getMonth(),

            lastDate: () => new Date(properties.year, properties.month + 1, 0).getDate(),
            dayOfWeek: (date) => {
                const dayOrdinal = new Date(properties.year, properties.month, date).getDay()
                return DaysOfWeek.toString(dayOrdinal)
            }
        }
        return properties
    }(new Date()))

    export default {
        data() {
            return {
                headers: [
                    {
                        text: 'Day',
                        value: 'day',
                        sortable: false
                    },
                    {
                        text: 'Day of Week',
                        value: 'dayOfWeek',
                        sortable: false
                    },
                    {
                        text: 'Starting Time',
                        value: 'startingTime',
                        sortable: false
                    },
                    {
                        text: 'Closing Time',
                        value: 'closingTime',
                        sortable: false
                    },
                    {
                        text: 'Break Hours',
                        value: 'breakHours',
                        sortable: false
                    },
                    {
                        text: 'Task Detail',
                        value: 'taskDetail',
                        sortable: false
                    },
                    {
                        text: 'Working Hours Day',
                        value: 'workingHoursDay',
                        sortable: false
                    },
                    {
                        text: 'Notices',
                        value: 'notices',
                        sortable: false
                    },
                ],
                dailyRecords: []
            }
        },
        mounted() {
            this.dailyRecords = [{
                'day': 1,
                'dayOfWeek': 1,
                'startingTime': 1,
                'closingTime': 1,
                'breakHours': 1,
                'taskDetail': 1,
                'workingHoursDay': 1,
                'notices': 1,
            }]
        }
    }
</script>

<style scoped>
</style>
