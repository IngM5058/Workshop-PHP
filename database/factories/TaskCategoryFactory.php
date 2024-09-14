<php?

public function definition()
{
    protected $model = TaskCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
