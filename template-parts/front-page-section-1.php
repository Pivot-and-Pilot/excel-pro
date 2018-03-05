<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

?>

<section>

    <div class="max-width-wrapper">

        <h3 class="counter">1</h3>

        <table class="calendar js-load">

            <thead>

                <tr>

                    <td>Sun</td>
                    <td>Mon</td>
                    <td>Tue</td>
                    <td>Wed</td>
                    <td>Thur</td>
                    <td>Fri</td>
                    <td>Sat</td>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <td class="lastmonth">30</td>
                    <td class="selected day1">1</td>
                    <td class="selected day2">2</td>
                    <td class="selected day3">3</td>
                    <td class="selected day4">4</td>
                    <td class="selected day5">5</td>
                    <td class="selected day6">6</td>

                </tr>

                <tr>

                    <td class="selected day7">7</td>
                    <td class="selected day8">8<img class="img-badge" src="<?php echo get_template_directory_uri() . '/img/badge.svg' ?>"/></td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>

                </tr>

                <tr>

                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>

                </tr>

                <tr>

                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>

                </tr>

                <tr>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td class="lastmonth">1</td>
                    <td class="lastmonth">2</td>
                    <td class="lastmonth">3</td>

                </tr>

            </tbody>

        </table>

        <article class="article-float-left">

            <?php the_field('section_1_content'); ?>

        </article>

    </div>

</section>