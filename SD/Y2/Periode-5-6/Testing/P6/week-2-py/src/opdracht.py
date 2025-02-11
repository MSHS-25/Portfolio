def find_max_value(numbers):
    max_value = 0;

    for number in numbers:
        if number > max_value: # < is fout
            max_value = number
    return max_value;